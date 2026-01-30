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

			// If response isn't OK, try to parse JSON error message and stop
			if (!resp.ok) {
				let json = null;
				try { json = await resp.json(); } catch (err) { /* ignore parse error */ }
				const msg = (json && json.message) ? json.message : 'Terjadi kesalahan.';
				createToast(msg, 'error');
				console.warn('[cart] add response not ok', resp.status, resp.statusText);
				return; // Stop here - don't show success toast
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

			// show toast success only when response is OK
			const message = data.message || 'Produk ditambahkan ke keranjang!';
			createToast(message, 'success');				// restore scroll position to avoid jumping
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

// ========================================
// ENHANCED UI INTERACTIONS
// ========================================

(function() {
	'use strict';

	// Smooth Scroll for Anchor Links
	function initSmoothScroll() {
		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function(e) {
				const href = this.getAttribute('href');
				if (href === '#' || href === '#!') return;
				
				const target = document.querySelector(href);
				if (target) {
					e.preventDefault();
					target.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
				}
			});
		});
	}

	// Intersection Observer for Scroll Animations
	function initScrollAnimations() {
		const observerOptions = {
			threshold: 0.1,
			rootMargin: '0px 0px -100px 0px'
		};

		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add('animate-fade-in');
					observer.unobserve(entry.target);
				}
			});
		}, observerOptions);

		// Observe elements with data-animate attribute
		document.querySelectorAll('[data-animate]').forEach(el => {
			el.style.opacity = '0';
			observer.observe(el);
		});
	}

	// Sticky Header Effect
	function initStickyHeader() {
		const header = document.querySelector('.sticky-header');
		if (!header) return;

		let lastScroll = 0;
		window.addEventListener('scroll', () => {
			const currentScroll = window.pageYOffset;
			
			if (currentScroll > 100) {
				header.classList.add('scrolled');
			} else {
				header.classList.remove('scrolled');
			}
			
			lastScroll = currentScroll;
		});
	}

	// Image Lazy Loading with Fade Effect
	function initLazyLoading() {
		if ('IntersectionObserver' in window) {
			const imageObserver = new IntersectionObserver((entries, observer) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						const img = entry.target;
						img.src = img.dataset.src;
						img.classList.add('fade-in');
						observer.unobserve(img);
					}
				});
			});

			document.querySelectorAll('img[data-src]').forEach(img => {
				imageObserver.observe(img);
			});
		}
	}

	// Product Card Hover Effects
	function initProductCardEffects() {
		document.querySelectorAll('.product-card').forEach(card => {
			card.addEventListener('mouseenter', function() {
				this.style.transform = 'translateY(-8px)';
			});
			
			card.addEventListener('mouseleave', function() {
				this.style.transform = 'translateY(0)';
			});
		});
	}

	// Enhanced Toast Notifications
	window.showToast = function(message, type = 'success') {
		const toast = document.createElement('div');
		toast.className = `fixed top-6 right-6 z-50 max-w-sm toast-slide-in`;
		
		const bgColor = type === 'success' ? 'bg-green-600' : 
		                type === 'error' ? 'bg-red-600' : 
		                type === 'warning' ? 'bg-yellow-600' : 'bg-blue-600';
		
		const icon = type === 'success' ? '✓' : 
		             type === 'error' ? '✕' : 
		             type === 'warning' ? '⚠' : 'ℹ';
		
		toast.innerHTML = `
			<div class="${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3">
				<span class="text-2xl">${icon}</span>
				<span class="flex-1">${message}</span>
				<button onclick="this.closest('div').parentElement.remove()" class="ml-2 hover:opacity-75">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
					</svg>
				</button>
			</div>
		`;
		
		document.body.appendChild(toast);
		
		setTimeout(() => {
			toast.style.opacity = '0';
			toast.style.transform = 'translateX(100%)';
			setTimeout(() => toast.remove(), 300);
		}, 4000);
	};

	// Parallax Effect for Hero Section
	function initParallax() {
		const parallaxElements = document.querySelectorAll('.parallax');
		if (parallaxElements.length === 0) return;

		window.addEventListener('scroll', () => {
			const scrolled = window.pageYOffset;
			parallaxElements.forEach(el => {
				const speed = el.dataset.speed || 0.5;
				el.style.transform = `translateY(${scrolled * speed}px)`;
			});
		});
	}

	// Back to Top Button
	function initBackToTop() {
		const backToTop = document.createElement('button');
		backToTop.innerHTML = `
			<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
			</svg>
		`;
		backToTop.className = 'fixed bottom-6 left-6 bg-amber-600 text-white p-4 rounded-full shadow-lg hover:bg-amber-700 transition opacity-0 pointer-events-none z-50';
		backToTop.setAttribute('aria-label', 'Kembali ke atas');
		document.body.appendChild(backToTop);

		window.addEventListener('scroll', () => {
			if (window.pageYOffset > 300) {
				backToTop.style.opacity = '1';
				backToTop.style.pointerEvents = 'auto';
			} else {
				backToTop.style.opacity = '0';
				backToTop.style.pointerEvents = 'none';
			}
		});

		backToTop.addEventListener('click', () => {
			window.scrollTo({ top: 0, behavior: 'smooth' });
		});
	}

	// Search Auto-complete (Basic)
	function initSearchAutocomplete() {
		const searchInput = document.querySelector('input[name="search"]');
		if (!searchInput) return;

		let timeout;
		searchInput.addEventListener('input', function() {
			clearTimeout(timeout);
			const value = this.value.trim();
			
			if (value.length < 2) return;
			
			timeout = setTimeout(() => {
				// Could fetch suggestions from server here
				console.log('Search suggestion for:', value);
			}, 300);
		});
	}

	// Image Gallery Lightbox (Simple)
	function initLightbox() {
		document.querySelectorAll('[data-lightbox]').forEach(trigger => {
			trigger.addEventListener('click', function(e) {
				e.preventDefault();
				const imgSrc = this.getAttribute('href') || this.querySelector('img')?.src;
				if (!imgSrc) return;

				const lightbox = document.createElement('div');
				lightbox.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4';
				lightbox.innerHTML = `
					<button class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300" onclick="this.parentElement.remove()">
						&times;
					</button>
					<img src="${imgSrc}" class="max-w-full max-h-full object-contain animate-scale-in" alt="Preview">
				`;
				document.body.appendChild(lightbox);

				lightbox.addEventListener('click', function(e) {
					if (e.target === lightbox) {
						lightbox.remove();
					}
				});
			});
		});
	}

	// Number Counter Animation
	function initCounterAnimation() {
		const counters = document.querySelectorAll('[data-counter]');
		const duration = 2000;

		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					const target = entry.target;
					const targetNumber = parseInt(target.dataset.counter) || parseInt(target.textContent.replace(/\D/g, ''));
					const increment = targetNumber / (duration / 16);
					let current = 0;

					const updateCounter = () => {
						current += increment;
						if (current < targetNumber) {
							target.textContent = Math.ceil(current).toLocaleString('id-ID');
							requestAnimationFrame(updateCounter);
						} else {
							target.textContent = targetNumber.toLocaleString('id-ID') + (target.dataset.suffix || '');
						}
					};

					updateCounter();
					observer.unobserve(target);
				}
			});
		}, { threshold: 0.5 });

		counters.forEach(counter => observer.observe(counter));
	}

	// Cart Badge Animation
	function animateCartBadge() {
		const badge = document.querySelector('[data-cart-count]');
		if (badge && badge.textContent !== '0') {
			badge.classList.add('badge-bounce');
			setTimeout(() => badge.classList.remove('badge-bounce'), 500);
		}
	}

	// Initialize All Enhanced Features
	function initEnhancedUI() {
		// Remove preload class to enable animations
		document.body.classList.remove('preload');
		
		initSmoothScroll();
		initScrollAnimations();
		initStickyHeader();
		initLazyLoading();
		initProductCardEffects();
		initParallax();
		initBackToTop();
		initSearchAutocomplete();
		initLightbox();
		initCounterAnimation();
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initEnhancedUI);
	} else {
		initEnhancedUI();
	}

	// Export animateCartBadge for use by other scripts
	window.animateCartBadge = animateCartBadge;

})();
