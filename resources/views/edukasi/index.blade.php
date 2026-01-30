<x-app-layout>
    <div class="bg-white min-h-screen">
        <!-- Hero Section Clean Design -->
        <section class="relative py-12 pb-4 bg-white">
            <!-- Clean Background -->
            <div class="absolute inset-0 bg-white"></div>

            <div class="max-w-6xl mx-auto px-6 lg:px-8 relative z-10">
                <!-- Clean Hero Content -->
                <div class="text-center space-y-10">
                    <!-- Simple Icon Container -->
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-500 rounded-2xl shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>

                    <!-- Clean Typography -->
                    <div class="max-w-4xl mx-auto space-y-6">
                        <h1 class="text-5xl lg:text-6xl font-bold text-amber-900 leading-tight">
                            Edukasi <span class="text-amber-500">Furniture</span>
                        </h1>
                        <div class="text-xl font-medium text-amber-600">
                            Pusat Edukasi Furniture Berkualitas Tinggi
                        </div>
                        <p class="text-lg text-amber-700 max-w-3xl mx-auto leading-relaxed">
                            Temukan pengetahuan mendalam tentang <strong class="text-amber-900">furniture berkualitas tinggi</strong> dari para ahli.
                            Pelajari teknik dan tips profesional untuk memilih furniture terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content Section -->
        <section class="py-8 bg-white">
            <div class="max-w-6xl mx-auto px-6 lg:px-8">
                @if($edukasiList->isEmpty())
                    <!-- Clean Empty State -->
                    <div class="max-w-2xl mx-auto">
                        <div class="bg-white rounded-xl p-10 text-center border border-amber-200 shadow-md">
                            <div class="space-y-8">
                                <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-500 rounded-xl mx-auto shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25A8.966 8.966 0 0 1 18 3.75c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"></path>
                                    </svg>
                                </div>
                                <div class="space-y-4">
                                    <h3 class="text-3xl font-bold text-amber-900">Konten Premium Segera Hadir</h3>
                                    <p class="text-lg text-amber-700 leading-relaxed">
                                        Tim ahli furniture kami sedang merancang <span class="text-amber-600 font-medium">konten eksklusif berkualitas tinggi</span>
                                        yang akan mengubah cara Anda memahami dunia furniture premium.
                                    </p>
                                </div>
                                <div class="flex flex-wrap justify-center gap-3">
                                    <div class="flex items-center gap-2 bg-green-50 px-4 py-2 rounded-lg">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                        <span class="text-sm font-medium text-green-700">Video Tutorial</span>
                                    </div>
                                    <div class="flex items-center gap-2 bg-blue-50 px-4 py-2 rounded-lg">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                        <span class="text-sm font-medium text-blue-700">Tips Expert</span>
                                    </div>
                                    <div class="flex items-center gap-2 bg-purple-50 px-4 py-2 rounded-lg">
                                        <span class="w-2 h-2 bg-purple-500 rounded-full"></span>
                                        <span class="text-sm font-medium text-purple-700">Panduan Premium</span>
                                    </div>
                                </div>
                                <button class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors duration-300 shadow-md">
                                    Segera Hadir
                                </button>
                                    </div>
                                    Dalam Pengembangan Premium
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Premium Article Grid dengan Enhanced Interactivity -->
                    <div class="space-y-6">
                        <!-- Clean Section Header -->
                        <div class="text-center space-y-4 mb-6">
                            <h2 class="text-3xl lg:text-4xl font-bold text-amber-900">
                                Artikel <span class="text-amber-500">Edukasi</span>
                            </h2>
                            <div class="w-24 h-1 bg-amber-500 mx-auto rounded-full"></div>
                            <p class="text-lg text-amber-700 max-w-2xl mx-auto leading-relaxed">
                                Pelajari tips dan pengetahuan tentang furniture berkualitas dari para ahli
                            </p>
                        </div>

                        <!-- Interactive Article Grid -->
                        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-6">
                            @foreach($edukasiList as $index => $edu)
                            <article class="bg-white rounded-xl overflow-hidden border border-amber-200 hover:border-amber-300 hover:shadow-lg transition-all duration-300 stagger-animation" data-delay="{{ $index * 150 }}">
                                <!-- Clean Image Container -->
                                <div class="relative h-48 overflow-hidden">
                                    @if($edu->gambar && file_exists(public_path('assets/img/' . $edu->gambar)))
                                        <img src="{{ asset('assets/img/' . $edu->gambar) }}"
                                             alt="{{ $edu->judul }}"
                                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full bg-amber-100 flex items-center justify-center">
                                            <div class="text-center space-y-2">
                                                <div class="w-12 h-12 mx-auto bg-amber-500 rounded-lg flex items-center justify-center shadow-md">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-sm font-medium text-amber-700">Konten Premium</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Clean Badges -->
                                    <div class="absolute top-4 left-4 right-4 flex justify-between items-start">
                                        <div class="bg-amber-500 text-white px-3 py-1 rounded-lg text-xs font-medium shadow-md">
                                            ✨ Premium
                                        </div>
                                        <div class="bg-white text-amber-700 px-3 py-1 rounded-lg text-xs font-medium shadow-md">
                                            🕒 3 menit
                                        </div>
                                    </div>
                                </div>

                                <!-- Clean Content Section -->
                                <div class="p-6 space-y-4">
                                    <!-- Title -->
                                    <h3 class="text-xl font-bold text-amber-900 leading-tight hover:text-amber-600 transition-colors duration-300">
                                        {{ $edu->judul }}
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-amber-700 leading-relaxed line-clamp-3">
                                        {{ Str::limit($edu->konten, 120) }}
                                    </p>

                                    <!-- Clean Tags -->
                                    <div class="flex flex-wrap gap-2 pt-2">
                                        <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-medium">
                                            🏆 Furniture Premium
                                        </span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-medium">
                                            💡 Tips Expert
                                        </span>
                                    </div>

                                    <!-- Clean CTA Button -->
                                    <div class="pt-4">
                                        <a href="{{ route('edukasi.show', $edu->id) }}" class="block w-full py-3 px-6 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg text-center">
                                            Baca Artikel Lengkap
                                        </a>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Clean CTA Section -->
        <section class="py-8 bg-white border-t border-amber-100">

            <div class="max-w-6xl mx-auto px-6 lg:px-8 relative z-10">
                <div class="text-center space-y-8">
                    <!-- Clean CTA Header -->
                    <div class="space-y-6">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-500 rounded-xl shadow-md mx-auto">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"></path>
                            </svg>
                        </div>

                        <div class="space-y-6">
                            <h3 class="text-3xl lg:text-4xl font-bold text-amber-900">
                                Mulai <span class="text-amber-500">Eksplorasi</span> Sekarang
                            </h3>
                            <p class="text-lg text-amber-700 max-w-2xl mx-auto leading-relaxed">
                                Jelajahi koleksi furniture premium kami dan temukan produk yang sempurna untuk rumah Anda.
                                <strong class="text-amber-900">Meubel Dua Putra</strong> - pilihan terpercaya untuk furniture berkualitas.
                            </p>
                        </div>
                    </div>

                    <!-- Clean CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-3 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                            </svg>
                            Jelajahi Koleksi Premium
                        </a>

                        <button class="inline-flex items-center px-8 py-3 bg-white hover:bg-amber-50 text-amber-700 font-semibold rounded-lg border border-amber-300 hover:border-amber-400 transition-colors duration-300">
                            <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Konsultasi Gratis
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- Enhanced JavaScript dengan Interactive Features -->
    <script nonce="{{ $cspNonce ?? '' }}">
        // Enhanced Counter Animation dengan Smooth Easing
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                if (!target || target === 0) return;

                const duration = 3000; // Longer duration for better effect
                let start = null;

                const animate = (timestamp) => {
                    if (!start) start = timestamp;
                    const progress = Math.min((timestamp - start) / duration, 1);
                    const easedProgress = easeOutCubic(progress);

                    const current = Math.floor(target * easedProgress);
                    counter.textContent = current;

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    } else {
                        counter.textContent = target;
                        // Add celebration effect
                        counter.style.transform = 'scale(1.1)';
                        setTimeout(() => {
                            counter.style.transform = 'scale(1)';
                        }, 200);
                    }
                };

                requestAnimationFrame(animate);
            });
        }

        // Enhanced Staggered Animation dengan Intersection Observer
        function initStaggerAnimation() {
            const cards = document.querySelectorAll('.stagger-animation');
            if (cards.length === 0) return;

            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const delay = parseInt(entry.target.getAttribute('data-delay') || 0);
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0) scale(1) rotateX(0)';
                        }, delay);
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(60px) scale(0.95) rotateX(10deg)';
                card.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                observer.observe(card);
            });
        }

        // Parallax Effect for Background Elements
        function initParallaxEffect() {
            const parallaxElements = document.querySelectorAll('[class*="animate-"]');

            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;

                parallaxElements.forEach((element, index) => {
                    const speed = 0.1 + (index * 0.05);
                    element.style.transform = \`translateY(\${scrolled * speed}px)\`;
                });
            });
        }

        // Interactive Hover Effects
        function initHoverEffects() {
            const cards = document.querySelectorAll('article');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    // Add glow effect to nearby cards
                    const siblings = [...this.parentElement.children];
                    siblings.forEach((sibling, index) => {
                        if (sibling !== this) {
                            sibling.style.filter = 'brightness(0.8)';
                            sibling.style.transform = 'scale(0.98)';
                        }
                    });
                });

                card.addEventListener('mouseleave', function() {
                    // Remove effects from all cards
                    const siblings = [...this.parentElement.children];
                    siblings.forEach(sibling => {
                        sibling.style.filter = 'brightness(1)';
                        sibling.style.transform = 'scale(1)';
                    });
                });
            });
        }

        // Enhanced Page Loading Animation
        function initPageAnimation() {
            const elements = [
                { selector: 'h1', delay: 0, effect: 'fadeInUp' },
                { selector: 'p', delay: 200, effect: 'fadeInUp' },
                { selector: '.grid', delay: 400, effect: 'fadeInUp' }
            ];

            elements.forEach(({ selector, delay, effect }) => {
                const element = document.querySelector(selector);
                if (element) {
                    element.style.opacity = '0';
                    element.style.transform = 'translateY(50px)';

                    setTimeout(() => {
                        element.style.transition = 'all 1s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }, delay);
                }
            });
        }

        // Initialize All Enhanced Functions
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Enhanced Counter Animation
            const statsSection = document.querySelector('.grid.grid-cols-1.md\\\\:grid-cols-3');
            if (statsSection) {
                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            setTimeout(animateCounters, 500);
                            counterObserver.disconnect();
                        }
                    });
                }, { threshold: 0.3 });

                counterObserver.observe(statsSection);
            }

            // Initialize all enhanced animations
            setTimeout(initPageAnimation, 100);
            setTimeout(initStaggerAnimation, 600);
            setTimeout(initHoverEffects, 1000);

            // Initialize parallax effect
            initParallaxEffect();

            // Enhanced smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });

        // Advanced CSS Animations dan Styles
        const enhancedStyles = document.createElement('style');
        enhancedStyles.textContent = \`
            /* Enhanced Animations */
            @keyframes gradient-x {
                0%, 100% { background-size: 200% 200%; background-position: left center; }
                50% { background-size: 200% 200%; background-position: right center; }
            }

            @keyframes float {
                0%, 100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-30px) rotate(5deg); }
            }

            @keyframes spin-slow {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            .animate-gradient-x {
                animation: gradient-x 8s ease infinite;
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-spin-slow {
                animation: spin-slow 8s linear infinite;
            }

            /* Enhanced Grid Pattern */
            .bg-grid-pattern {
                background-image:
                    linear-gradient(rgba(251, 191, 36, 0.1) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(251, 191, 36, 0.1) 1px, transparent 1px);
                background-size: 50px 50px;
            }

            /* Enhanced Hover Effects */
            article:hover {
                transform: translateY(-20px) scale(1.03) rotateX(-2deg);
                box-shadow: 0 25px 50px -12px rgba(251, 191, 36, 0.4);
            }

            /* Enhanced Backdrop Blur */
            .backdrop-blur-xl {
                backdrop-filter: blur(24px) saturate(180%);
                -webkit-backdrop-filter: blur(24px) saturate(180%);
            }

            .backdrop-blur-md {
                backdrop-filter: blur(16px) saturate(180%);
                -webkit-backdrop-filter: blur(16px) saturate(180%);
            }

            /* Enhanced Scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                background: rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(180deg, #f59e0b, #ea580c);
                border-radius: 10px;
                border: 2px solid rgba(255, 255, 255, 0.3);
            }

            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(180deg, #d97706, #c2410c);
            }

            /* Enhanced Button Effects */
            button:hover, a:hover {
                transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            }

            /* Enhanced Line Clamp */
            .line-clamp-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Enhanced Typography */
            body {
                text-rendering: optimizeLegibility;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                font-feature-settings: "liga", "kern";
            }

            /* Performance optimizations */
            * {
                backface-visibility: hidden;
                perspective: 1000px;
            }
        \`;
        document.head.appendChild(enhancedStyles);
    </script>
    </div>
</x-app-layout>
