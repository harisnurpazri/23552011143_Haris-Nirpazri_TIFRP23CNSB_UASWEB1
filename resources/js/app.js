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
			console.debug('[cart] submit handler invoked');
			const form = e.currentTarget;
			const action = form.getAttribute('action');
			console.debug('[cart] action', action);
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

				// If response isn't OK, try to parse JSON error message but continue to fallback count fetch
				if (!resp.ok) {
					let json = null;
					try { json = await resp.json(); } catch (err) { /* ignore parse error */ }
					const msg = (json && json.message) ? json.message : 'Terjadi kesalahan.';
					createToast(msg, 'error');
					console.warn('[cart] add response not ok', resp.status, resp.statusText);
					// attempt to refresh badge regardless (server-side may have updated session)
				}

				// Try to parse JSON body if any (don't throw on parse error)
				let data = {};
				try { data = await resp.json() || {}; } catch (err) { data = {}; }

				// Helper: ensure badge exists (create if missing)
				function ensureBadge() {
					let b = document.querySelector('[data-cart-count]');
					if (b) return b;
					// try to find cart link in navigation
					const cartLink = document.querySelector('a[href*="/cart"]');
					if (!cartLink) return null;
					b = document.createElement('span');
					b.setAttribute('data-cart-count', '0');
					b.className = 'absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center hidden';
					b.textContent = '0';
					// ensure parent is positioned so absolute works
					if (getComputedStyle(cartLink).position === 'static') cartLink.style.position = 'relative';
					cartLink.appendChild(b);
					return b;
				}

				// If server provided cartCount in response, use it immediately
				if (data.cartCount !== undefined) {
					const badge = ensureBadge();
					if (badge) {
						badge.textContent = data.cartCount;
						if (Number(data.cartCount) > 0) badge.classList.remove('hidden'); else badge.classList.add('hidden');
					}
					console.debug('[cart] used cartCount from add response', data.cartCount);
				}

				// Always fetch authoritative cart count from server as a reliable fallback
				try {
					const countUrlMeta = document.querySelector('meta[name="cart-count-url"]');
					const countUrl = countUrlMeta ? countUrlMeta.getAttribute('content') : '/cart/count';
					console.debug('[cart] fetching fallback count from', countUrl);
					const r = await fetch(countUrl, { headers: { 'Accept': 'application/json' }, credentials: 'same-origin' });
					if (r.ok) {
						const cd = await r.json();
						const badge = ensureBadge();
						if (badge && cd.cartCount !== undefined) {
							badge.textContent = cd.cartCount;
							if (Number(cd.cartCount) > 0) badge.classList.remove('hidden'); else badge.classList.add('hidden');
							console.debug('[cart] fallback count', cd.cartCount);
						}
					} else {
						console.warn('[cart] Failed to fetch cart count fallback', r.status, r.statusText);
					}
				} catch (err) {
					console.warn('[cart] Error fetching cart count fallback', err);
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

	function initRealtimeClocks() {
		const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
		const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

		function two(n) { return String(n).padStart(2, '0'); }

		function formatDateTime(d) {
			const dayName = days[d.getDay()];
			const date = d.getDate();
			const monthName = months[d.getMonth()];
			const year = d.getFullYear();
			const h = two(d.getHours());
			const m = two(d.getMinutes());
			const s = two(d.getSeconds());
			return `${dayName}, ${date} ${monthName} ${year} ${h}:${m}:${s}`;
		}

		const els = Array.from(document.querySelectorAll('[data-realtime-clock]'));
		if (els.length === 0) return;

		function tick() {
			const now = new Date();
			const text = formatDateTime(now);
			els.forEach(el => {
				el.textContent = text;
			});
		}

		// initial render and interval
		tick();
		setInterval(tick, 1000);
	}

	function initAll() {
		initAjaxAddToCart();
		initPreserveScroll();
		initExportSync();
		initRealtimeClocks();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initAll);
	} else {
		initAll();
	}
})();
