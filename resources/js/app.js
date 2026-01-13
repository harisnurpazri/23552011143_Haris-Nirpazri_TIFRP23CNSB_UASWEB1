import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// AJAX add-to-cart handler: intercept forms with .ajax-add-to-cart
// initialize handlers (works even if this script runs after DOMContentLoaded)
(function() {
	function initAjaxAddToCart() {
		function createToast(message, type = 'success') {
			const id = `toast-${Date.now()}`;
			const container = document.createElement('div');
			container.id = id;
			container.className = 'fixed top-6 right-6 z-50 max-w-sm';
			container.innerHTML = `
				<div class="p-3 rounded shadow-lg ${type === 'success' ? 'bg-green-600 text-white' : 'bg-red-600 text-white'}">
					${message}
				</div>
			`;
			document.body.appendChild(container);
			setTimeout(() => {
				container.remove();
			}, 3500);
		}

		async function handleAddToCartSubmit(e) {
			e.preventDefault();
			e.stopPropagation();
			const form = e.currentTarget;
			const action = form.getAttribute('action');
			const formData = new FormData(form);
			// preserve scroll position so UI doesn't jump
			const scrollY = window.scrollY || window.pageYOffset;

			// disable submit button to avoid double submits
			const submitBtn = form.querySelector('button[type="submit"]');
			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.setAttribute('aria-disabled', 'true');
			}

			// Fetch with same-origin credentials for session
			try {
				const resp = await fetch(action, {
					method: 'POST',
					headers: {
						'X-Requested-With': 'XMLHttpRequest',
						'Accept': 'application/json',
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
					},
					body: formData,
					credentials: 'same-origin'
				});

				if (!resp.ok) {
					// try to parse JSON message
					let json = null;
					try { json = await resp.json(); } catch (err) { /* ignore */ }
					const msg = (json && json.message) ? json.message : 'Terjadi kesalahan.';
					createToast(msg, 'error');
					return;
				}

				const data = await resp.json();

				// update cart count if returned
				if (data.cartCount !== undefined) {
					const badge = document.querySelector('[data-cart-count]');
					if (badge) badge.textContent = data.cartCount;
				}

				// show toast success
				const message = data.message || 'Produk ditambahkan ke keranjang!';
				createToast(message, 'success');

				// restore scroll position to avoid jumping
				window.scrollTo({ top: scrollY });

			} catch (err) {
				console.error('Add to cart error', err);
				createToast('Gagal menambahkan produk ke keranjang.', 'error');
				// restore scroll position on error as well
				window.scrollTo({ top: scrollY });
			}
			finally {
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.removeAttribute('aria-disabled');
				}
			}
		}

		// attach handlers
		document.querySelectorAll('form.ajax-add-to-cart').forEach(f => {
			// avoid double-binding
			if (!f.__ajaxAddToCartBound) {
				f.addEventListener('submit', handleAddToCartSubmit);
				f.__ajaxAddToCartBound = true;
			}
		});
	}
	function initPreserveScroll() {
		// When a form with .preserve-scroll is submitted, save current scroll
		document.querySelectorAll('form.preserve-scroll').forEach(f => {
			if (!f.__preserveScrollBound) {
				f.addEventListener('submit', () => {
					try {
						const scrollY = window.scrollY || window.pageYOffset || 0;
						sessionStorage.setItem('preserveScroll', String(scrollY));
					} catch (e) {
						// ignore storage errors
					}
				});
				f.__preserveScrollBound = true;
			}
		});

		// On load, restore scroll if key present
		try {
			const val = sessionStorage.getItem('preserveScroll');
			if (val !== null) {
				const y = parseInt(val, 10);
				if (!Number.isNaN(y)) {
					// Small delay to ensure layout painted
					window.scrollTo({ top: y });
				}
				sessionStorage.removeItem('preserveScroll');
			}
		} catch (e) {
			// ignore
		}
	}

	function initExportSync() {
		const form = document.getElementById('orders-filter-form');
		const btn = document.getElementById('export-orders-btn');

		if (!form || !btn) return;

		const base = btn.getAttribute('data-export-base') || btn.getAttribute('href') || '';

		function updateHref() {
			try {
				const formData = new FormData(form);
				const params = new URLSearchParams();
				for (const [k, v] of formData.entries()) {
					if (v !== null && String(v).length > 0) params.append(k, v);
				}
				const qs = params.toString();
				btn.href = base + (qs ? ('?' + qs) : '');
			} catch (e) {
				// ignore
			}
		}

		// Update when inputs change
		form.querySelectorAll('input, select').forEach(el => {
			el.addEventListener('change', updateHref);
		});

		// initial update
		updateHref();
	}

	function initAll() {
		initAjaxAddToCart();
		initPreserveScroll();
		initExportSync();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initAll);
	} else {
		initAll();
	}
})();
