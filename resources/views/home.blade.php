<x-app-layout>
    <!-- Enhanced CSS Animations and Smooth Effects (tweaked) -->
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-slideInLeft { animation: slideInLeft 0.8s ease-out forwards; }
        .animate-slideInRight { animation: slideInRight 0.8s ease-out forwards; }
        .animate-floating { animation: floating 3.2s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse 3s ease-in-out infinite; }

        /* More granular delay helpers (used throughout template) */
        .delay-50  { animation-delay: 50ms; }
        .delay-100 { animation-delay: 100ms; }
        .delay-150 { animation-delay: 150ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }
        .delay-500 { animation-delay: 500ms; }
        .delay-800 { animation-delay: 800ms; }
        .delay-1000 { animation-delay: 1000ms; }
        .delay-1500 { animation-delay: 1500ms; }
        .delay-2000 { animation-delay: 2000ms; }

        .hover-lift:hover { transform: translateY(-8px); }
        .hover-scale:hover { transform: scale(1.05); }

        .smooth-transition { transition: all 0.32s cubic-bezier(0.4, 0, 0.2, 1); }

        .glass-effect { backdrop-filter: blur(8px); background: rgba(255,255,255,0.72); }

        .text-shadow { text-shadow: 0 2px 6px rgba(0,0,0,0.12); }

        .rounded-4xl { border-radius: 2rem; }

        /* subtle utility for softer overlays */
        .overlay-soft { background: linear-gradient(90deg, rgba(0,0,0,0.6), rgba(0,0,0,0.45)); }
    </style>

    <!-- Hero Section - Enhanced Attractive Design -->
    <div class="bg-gray-100 py-6 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-10 left-10 w-32 h-32 bg-gradient-to-br from-blue-200/30 to-purple-300/20 rounded-full animate-pulse"></div>
            <div class="absolute top-1/3 right-20 w-24 h-24 bg-gradient-to-br from-orange-200/20 to-red-300/15 rounded-full animate-bounce delay-1000" style="animation-duration: 3s"></div>
            <div class="absolute bottom-20 left-1/4 w-20 h-20 bg-gradient-to-br from-green-200/25 to-emerald-300/20 rounded-full animate-pulse delay-500"></div>
            <div class="absolute top-20 right-1/3 w-16 h-16 bg-gradient-to-br from-yellow-200/30 to-amber-300/20 rounded-full animate-bounce delay-2000" style="animation-duration: 4s"></div>
        </div>

        <div class="max-w-full mx-auto relative z-10">
            <!-- Main Card Container -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl relative mx-4 sm:mx-6 transform hover:scale-[1.02] transition-all duration-700 hover:shadow-3xl">
                <!-- Background Image with Enhanced Overlay -->
                <div class="absolute inset-0">
                    <img
                        src="{{ asset('images/bgnew.png') }}"
                        alt="Premium Furniture Collection"
                        class="w-full h-full object-cover filter blur-sm"
                    >
                    <!-- Multi-layered Strong Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/75 to-black/60"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40"></div>
                    <div class="absolute inset-0 bg-black/20"></div>
                </div>

                <!-- Enhanced Content Container -->
                <div class="relative z-10 grid lg:grid-cols-2 items-center min-h-[600px]">
                    <!-- Left Content dengan Enhanced Design -->
                    <div class="p-8 sm:p-12 lg:p-16 space-y-8 relative">
                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-gradient-to-br from-blue-500/20 to-purple-600/15 rounded-full blur-xl animate-pulse"></div>
                        <div class="absolute top-1/2 -right-8 w-32 h-32 bg-gradient-to-br from-orange-400/15 to-red-500/10 rounded-full blur-2xl animate-pulse delay-1000"></div>

                        <!-- Premium Badge (text-focused, no icons) -->
                        <div class="inline-flex items-center px-5 py-3 bg-black/40 backdrop-blur-md rounded-full border border-white/30 shadow-lg transition-all duration-300 transform hover:scale-105 animate-fadeInUp">
                            <span class="text-white font-extrabold text-sm tracking-wider uppercase" style="letter-spacing:0.08em; text-shadow: 2px 2px 6px rgba(0,0,0,0.7)">PREMIUM FURNITURE COLLECTION</span>
                        </div>

                        <!-- Enhanced Main Title (typography-first) -->
                        <div class="space-y-4">
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight tracking-tight animate-fadeInUp delay-200" style="text-shadow: 4px 6px 18px rgba(0,0,0,0.75);">
                                <span class="block animate-slideInLeft">Furniture untuk</span>
                                <span class="block animate-slideInRight delay-300" style="background: linear-gradient(90deg,#FFD27A,#FF7A59); -webkit-background-clip: text; color: transparent;">Rumah Impian</span>
                            </h1>

                            <!-- Enhanced Subtitle (clean and bold phrase emphasis) -->
                            <p class="text-md sm:text-lg lg:text-xl text-white leading-snug max-w-2xl animate-fadeInUp delay-400 font-medium" style="text-shadow: 2px 3px 10px rgba(0,0,0,0.65);">
                                Koleksi, penjualan dan konsultasi furniture — dari sofa hingga lemari. <span class="font-bold" style="color: #FFD27A;">Berkualitas tinggi untuk setiap ruang.</span>
                            </p>

                            <div class="w-20 h-1 rounded-full" style="background: linear-gradient(90deg,#FFD27A,#FF7A59); box-shadow: 0 6px 18px rgba(255,122,89,0.12);"></div>
                        </div>

                        <!-- Enhanced Call to Action Button (text-only, prominent) -->
                        <div class="pt-4 animate-fadeInUp delay-600 relative z-20">
                            <div class="relative inline-block">
                                <a href="#products" class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-extrabold uppercase tracking-wide py-4 px-10 rounded-2xl shadow-xl hover:shadow-2xl transition transform hover:scale-105" style="letter-spacing:0.06em;">
                                    Mulai Berbelanja
                                </a>

                                <!-- subtle glow behind button -->
                                <div class="absolute -inset-1 rounded-2xl blur-md opacity-30" style="background: linear-gradient(90deg, rgba(255,210,122,0.12), rgba(255,122,89,0.14)); pointer-events: none;"></div>
                            </div>
                        </div>

                        <!-- Floating Statistics - positioned below button to avoid overlap -->
                        <div class="pt-16 hidden lg:flex space-x-6 animate-fadeInUp delay-800">
                            <div class="bg-black/60 backdrop-blur-md rounded-2xl p-4 border border-white/30 shadow-2xl hover:bg-black/70 transition-all duration-300 cursor-pointer transform hover:scale-105">
                                <div class="text-2xl font-black text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8)">1000+</div>
                                <div class="text-xs text-gray-200 font-medium" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.8)">Produk Premium</div>
                            </div>
                            <div class="bg-black/60 backdrop-blur-md rounded-2xl p-4 border border-white/30 shadow-2xl hover:bg-black/70 transition-all duration-300 cursor-pointer transform hover:scale-105">
                                <div class="text-2xl font-black text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8)">98%</div>
                                <div class="text-xs text-gray-200 font-medium" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.8)">Kepuasan</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Content - Enhanced Image Area -->
                    <div class="relative h-full min-h-[400px] lg:min-h-[600px] flex items-center justify-center">
                        <!-- Showcase Image -->
                        <div class="relative w-full max-w-2xl px-6 lg:px-12">
                            <img
                                src="{{ asset('images/toko.png') }}"
                                alt="Showcase Furniture"
                                class="w-full max-w-md mx-auto h-[220px] lg:h-[380px] object-cover rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-700 animate-floating delay-200"
                                style="object-position: center;"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section - Enhanced with Staggered Animations -->
    <!-- Features Section - Enhanced with Staggered Animations -->
    <div class="py-16 md:py-24 lg:py-32 bg-gradient-to-br from-gray-50 via-white to-gray-100 relative overflow-hidden">
        <!-- Enhanced Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Geometric Patterns -->
            <div class="absolute top-20 left-1/4 w-20 h-20 bg-gradient-to-br from-amber-200 to-orange-200 rounded-full opacity-10 animate-floating delay-200"></div>
            <div class="absolute bottom-20 right-1/4 w-16 h-16 bg-gradient-to-br from-orange-200 to-red-200 rounded-full opacity-10 animate-floating delay-400"></div>

            <!-- Additional decorative elements -->
            <div class="absolute top-1/2 left-10 w-32 h-32 bg-gradient-to-r from-amber-100 to-transparent rounded-full opacity-5 animate-floating delay-600"></div>
            <div class="absolute top-1/3 right-20 w-24 h-24 bg-gradient-to-l from-orange-100 to-transparent rounded-full opacity-5 animate-floating delay-800"></div>

            <!-- Subtle grid pattern -->
            <div class="absolute inset-0 opacity-[0.015] bg-[url('data:image/svg+xml,<svg width=&quot;40&quot; height=&quot;40&quot; viewBox=&quot;0 0 40 40&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;><g fill=&quot;%23f59e0b&quot; fill-opacity=&quot;0.03&quot; fill-rule=&quot;evenodd&quot;><path d=&quot;m0 40l40-40h-40v40zm40 0v-40h-40l40 40z&quot;/></g></svg>')]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-24 animate-fadeInUp">
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-amber-100 to-orange-100 text-amber-700 rounded-full text-sm font-bold mb-6 shadow-lg border border-amber-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    Keunggulan Premium Kami
                </div>
                <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-8 leading-tight">
                    Mengapa Memilih
                    <span class="bg-gradient-to-r from-amber-600 via-orange-500 to-red-500 bg-clip-text text-transparent">Furniture Kami?</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed font-medium">
                    Temukan alasan mengapa ribuan keluarga mempercayai kami sebagai partner dalam mewujudkan rumah impian.
                    Setiap detail dirancang untuk memberikan <span class="font-bold text-amber-600">pengalaman terbaik</span> bagi Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
                <!-- Feature Card 1 - Professional Enhanced -->
                <div class="relative bg-gradient-to-br from-white via-gray-50 to-white p-8 md:p-10 rounded-4xl shadow-xl hover:shadow-2xl transition-all duration-700 border border-gray-100 group hover-lift hover-scale smooth-transition animate-fadeInUp delay-100 cursor-pointer overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-amber-300 to-transparent rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-orange-300 to-transparent rounded-full"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-amber-400 via-amber-500 to-orange-500 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-xl group-hover:shadow-2xl">
                            <svg class="w-10 h-10 text-white group-hover:scale-125 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>

                        <!-- Quality Badge -->
                        <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="bg-gradient-to-r from-amber-100 to-orange-100 text-amber-700 px-3 py-1 rounded-full text-xs font-bold border border-amber-200">
                                PREMIUM
                            </div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-amber-600 transition-colors duration-300">Kualitas Premium</h3>
                        <p class="text-gray-600 leading-relaxed text-lg group-hover:text-gray-700 smooth-transition">
                            Dibuat dari <span class="font-bold text-amber-600 bg-amber-50 px-2 py-1 rounded-lg">bahan terbaik</span> dengan perhatian pada detail. Setiap produk melalui <span class="font-bold text-amber-600 bg-amber-50 px-2 py-1 rounded-lg">kontrol kualitas ketat</span> untuk memastikan daya tahan dan keindahan yang berkelanjutan.
                        </p>

                        <!-- Professional indicator -->
                        <div class="mt-6 flex items-center text-sm text-gray-500 group-hover:text-amber-600 transition-colors duration-300">
                            <div class="w-2 h-2 bg-amber-500 rounded-full mr-2"></div>
                            Standar Internasional ISO 9001
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 - Professional Enhanced -->
                <div class="relative bg-gradient-to-br from-white via-blue-50 to-white p-8 md:p-10 rounded-4xl shadow-xl hover:shadow-2xl transition-all duration-700 border border-gray-100 group hover-lift hover-scale smooth-transition animate-fadeInUp delay-200 cursor-pointer overflow-hidden">
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 left-0 w-28 h-28 bg-gradient-to-br from-blue-300 to-transparent rounded-full"></div>
                        <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-cyan-300 to-transparent rounded-full"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 via-blue-600 to-cyan-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-xl group-hover:shadow-2xl">
                            <svg class="w-10 h-10 text-white group-hover:scale-125 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>

                        <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">
                                MODERN
                            </div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">Desain Modern</h3>
                        <p class="text-gray-600 leading-relaxed text-lg group-hover:text-gray-700 smooth-transition">
                            Mengikuti tren terkini dengan <span class="font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-lg">desain contemporary</span> yang timeless. Setiap piece dirancang untuk memberikan <span class="font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-lg">estetika visual</span> yang memukau dalam ruang hidup Anda.
                        </p>

                        <div class="mt-6 flex items-center text-sm text-gray-500 group-hover:text-blue-600 transition-colors duration-300">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                            Award-Winning Design Team
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 - Professional Enhanced -->
                <div class="relative bg-gradient-to-br from-white via-green-50 to-white p-8 md:p-10 rounded-4xl shadow-xl hover:shadow-2xl transition-all duration-700 border border-gray-100 group hover-lift hover-scale smooth-transition animate-fadeInUp delay-300 cursor-pointer overflow-hidden">
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-green-300 to-transparent rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-emerald-300 to-transparent rounded-full"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 via-green-600 to-emerald-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-xl group-hover:shadow-2xl">
                            <svg class="w-10 h-10 text-white group-hover:scale-125 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>

                        <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">
                                GRATIS
                            </div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-green-600 transition-colors duration-300">Gratis Ongkir</h3>
                        <p class="text-gray-600 leading-relaxed text-lg group-hover:text-gray-700 smooth-transition">
                            Nikmati <span class="font-bold text-green-600 bg-green-50 px-2 py-1 rounded-lg">layanan pengiriman gratis</span> dan pemasangan profesional di wilayah Pangandaran. Termasuk <span class="font-bold text-green-600 bg-green-50 px-2 py-1 rounded-lg">layanan white-glove</span>.
                        </p>

                        <div class="mt-6 flex items-center text-sm text-gray-500 group-hover:text-green-600 transition-colors duration-300">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            Area Pangandaran & Sekitarnya
                        </div>
                    </div>
                </div>

                <!-- Feature Card 4 - Professional Enhanced -->
                <div class="relative bg-gradient-to-br from-white via-purple-50 to-white p-8 md:p-10 rounded-4xl shadow-xl hover:shadow-2xl transition-all duration-700 border border-gray-100 group hover-lift hover-scale smooth-transition animate-fadeInUp delay-400 cursor-pointer overflow-hidden">
                        <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 left-0 w-28 h-28 bg-gradient-to-br from-purple-300 to-transparent rounded-full"></div>
                        <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-violet-300 to-transparent rounded-full"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 via-purple-600 to-violet-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-xl group-hover:shadow-2xl">
                            <svg class="w-10 h-10 text-white group-hover:scale-125 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>

                        <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="bg-gradient-to-r from-purple-100 to-violet-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold border border-purple-200">
                                CEPAT
                            </div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-purple-600 transition-colors duration-300">Layanan Cepat</h3>
                        <p class="text-gray-600 leading-relaxed text-lg group-hover:text-gray-700 smooth-transition">
                            <span class="font-bold text-purple-600 bg-purple-50 px-2 py-1 rounded-lg">Waktu proses dan pengiriman cepat</span> tanpa mengurangi kualitas. Dapatkan furniture impian Anda lebih cepat dari yang diharapkan.
                        </p>

                        <div class="mt-6 flex items-center text-sm text-gray-500 group-hover:text-purple-600 transition-colors duration-300">
                            <div class="w-2 h-2 bg-purple-500 rounded-full mr-2"></div>
                            Express Delivery 1-3 Hari
                        </div>
                    </div>
                </div>

                <!-- Feature Card 5 - Professional Enhanced -->
                <div class="relative bg-gradient-to-br from-white via-red-50 to-white p-8 md:p-10 rounded-4xl shadow-xl hover:shadow-2xl transition-all duration-700 border border-gray-100 group hover-lift hover-scale smooth-transition animate-fadeInUp delay-500 cursor-pointer overflow-hidden">
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-red-300 to-transparent rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-rose-300 to-transparent rounded-full"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-red-500 via-red-600 to-rose-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-xl group-hover:shadow-2xl">
                            <svg class="w-10 h-10 text-white group-hover:scale-125 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>

                        <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="bg-gradient-to-r from-red-100 to-rose-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">
                                24/7
                            </div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-red-600 transition-colors duration-300">Customer Care</h3>
                        <p class="text-gray-600 leading-relaxed text-lg group-hover:text-gray-700 smooth-transition">
                            <span class="font-bold text-red-600 bg-red-50 px-2 py-1 rounded-lg">Dukungan pelanggan 24/7</span> dan garansi seumur hidup untuk semua produk. Kami siap membantu Anda merawat furniture Anda.
                        </p>

                        <div class="mt-6 flex items-center text-sm text-gray-500 group-hover:text-red-600 transition-colors duration-300">
                            <div class="w-2 h-2 bg-red-500 rounded-full mr-2"></div>
                            Lifetime Warranty Support
                        </div>
                    </div>
                </div>

                <!-- Feature Card 6 - Professional Enhanced -->
                <div class="relative bg-gradient-to-br from-white via-indigo-50 to-white p-8 md:p-10 rounded-4xl shadow-xl hover:shadow-2xl transition-all duration-700 border border-gray-100 group hover-lift hover-scale smooth-transition animate-fadeInUp delay-600 cursor-pointer overflow-hidden">
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 left-0 w-28 h-28 bg-gradient-to-br from-indigo-300 to-transparent rounded-full"></div>
                        <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-blue-300 to-transparent rounded-full"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 via-indigo-600 to-blue-600 rounded-3xl flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-xl group-hover:shadow-2xl">
                            <svg class="w-10 h-10 text-white group-hover:scale-125 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>

                        <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold border border-indigo-200">
                                VALUE
                            </div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-indigo-600 transition-colors duration-300">Harga Terjangkau</h3>
                        <p class="text-gray-600 leading-relaxed text-lg group-hover:text-gray-700 smooth-transition">
                            <span class="font-bold text-indigo-600 bg-indigo-50 px-2 py-1 rounded-lg">Harga kompetitif</span> tanpa mengorbankan kualitas. Tersedia <span class="font-bold text-indigo-600 bg-indigo-50 px-2 py-1 rounded-lg">opsi pembayaran fleksibel</span> dan diskon musiman.
                        </p>

                        <div class="mt-6 flex items-center text-sm text-gray-500 group-hover:text-indigo-600 transition-colors duration-300">
                            <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
                            Cicilan 0% Tersedia
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Furniture Categories - Enhanced Professional Design -->
    <div class="bg-gradient-to-br from-white via-gray-50 to-amber-50/30 py-16 md:py-24 lg:py-32 relative overflow-hidden">
        <!-- Enhanced Sophisticated background pattern -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Main decorative elements -->
            <div class="absolute top-1/4 left-10 w-32 h-32 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full opacity-10 animate-floating"></div>
            <div class="absolute bottom-1/4 right-10 w-24 h-24 bg-gradient-to-br from-orange-100 to-red-100 rounded-full opacity-10 animate-floating delay-500"></div>

            <!-- Additional sophisticated patterns -->
            <div class="absolute top-10 right-1/3 w-20 h-20 bg-gradient-to-tr from-amber-200 to-transparent rounded-full opacity-8 animate-floating delay-300"></div>
            <div class="absolute bottom-32 left-1/3 w-16 h-16 bg-gradient-to-bl from-orange-200 to-transparent rounded-full opacity-8 animate-floating delay-700"></div>

            <!-- Mesh gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-amber-50/20 to-transparent"></div>

            <!-- Subtle texture pattern -->
            <div class="absolute inset-0 opacity-[0.015] bg-[url('data:image/svg+xml,<svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><g fill="%23f59e0b" fill-opacity="0.03" fill-rule="evenodd"><path d="m0 40l40-40h-40v40zm40 0v-40h-40l40 40z"/></g></svg>')]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-24 animate-fadeInUp">
                <!-- Professional Badge -->
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 text-amber-700 rounded-full text-sm font-bold mb-8 shadow-lg border border-amber-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                    Koleksi Terlengkap & Terpopuler
                </div>

                <!-- Enhanced Title -->
                <h2 class="text-5xl md:text-7xl font-black text-gray-900 mb-8 leading-tight">
                    Kategori
                    <span class="bg-gradient-to-r from-amber-600 via-orange-500 to-red-500 bg-clip-text text-transparent">Furniture Populer</span>
                </h2>

                <!-- Professional Description -->
                <div class="max-w-4xl mx-auto">
                    <p class="text-xl text-gray-600 leading-relaxed font-medium mb-6 animate-fadeInUp delay-200">
                        Temukan koleksi furniture terfavorit kami, dipilih dengan teliti untuk menghadirkan gaya dan fungsionalitas
                        ke setiap ruangan di rumah Anda. Setiap kategori dirancang khusus untuk <span class="font-bold text-amber-600 bg-amber-50 px-2 py-1 rounded-lg">kebutuhan modern</span> Anda.
                    </p>

                    <!-- Professional Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-2xl mx-auto animate-fadeInUp delay-300">
                        <div class="text-center">
                            <div class="text-3xl font-black text-amber-600 mb-1">50+</div>
                            <div class="text-sm text-gray-500 font-medium">Kategori Produk</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-black text-orange-600 mb-1">1000+</div>
                            <div class="text-sm text-gray-500 font-medium">Pilihan Design</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-black text-red-600 mb-1">98%</div>
                            <div class="text-sm text-gray-500 font-medium">Kepuasan Pelanggan</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 md:gap-8">
                @foreach($categories as $index => $cat)
                <a href="{{ route('home', ['kategori' => $cat]) }}"
                   class="group bg-gradient-to-br from-white to-gray-50/50 hover:from-amber-50 hover:to-orange-50 p-6 md:p-8 rounded-3xl text-center transition-all duration-700 border border-gray-100 hover:border-amber-300 hover:shadow-2xl hover-lift smooth-transition animate-fadeInUp cursor-pointer relative overflow-hidden"
                   style="animation-delay: {{ ($index * 100) + 300 }}ms">

                    <!-- Background Pattern Overlay -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-5 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-amber-300 to-orange-300 rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-16 h-16 bg-gradient-to-tr from-orange-300 to-red-300 rounded-full"></div>
                    </div>

                    <!-- Enhanced Icon Container -->
                    <div class="relative mb-6 z-10">
                        <div class="w-20 h-20 mx-auto bg-gradient-to-br from-amber-100 to-amber-200 group-hover:from-amber-200 group-hover:to-orange-200 rounded-3xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-700 shadow-lg group-hover:shadow-2xl relative overflow-hidden">
                            <!-- Icon shine effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-in-out"></div>

                            <svg class="w-10 h-10 text-amber-600 group-hover:text-amber-700 group-hover:scale-125 transition-all duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($index % 6 == 0)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                @elseif($index % 6 == 1)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                @elseif($index % 6 == 2)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                @elseif($index % 6 == 3)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                @elseif($index % 6 == 4)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                @endif
                            </svg>
                        </div>

                        <!-- Enhanced Floating indicator -->
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 animate-pulse shadow-lg">
                            <span class="text-white text-xs font-bold">{{ $index + 1 }}</span>
                        </div>

                        <!-- Decorative ring -->
                        <div class="absolute inset-0 rounded-3xl border-2 border-amber-200 opacity-0 group-hover:opacity-30 group-hover:scale-110 transition-all duration-500"></div>
                    </div>

                    <!-- Enhanced Typography -->
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-amber-700 transition-colors duration-500 mb-2">{{ $cat }}</h3>
                        <p class="text-sm text-gray-500 group-hover:text-amber-600 transition-colors duration-500 font-medium">Koleksi Premium</p>
                    </div>

                    <!-- Enhanced Interactive Arrow -->
                    <div class="mt-6 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-3 group-hover:translate-y-0 relative z-10">
                        <div class="w-8 h-8 mx-auto bg-gradient-to-r from-amber-500 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- Enhanced CTA Section -->
            <div class="mt-24 text-center animate-fadeInUp delay-700">
                <div class="relative bg-gradient-to-r from-amber-100 via-orange-50 to-amber-100 rounded-4xl p-10 border-2 border-amber-200 shadow-2xl overflow-hidden group hover:shadow-3xl transition-all duration-700">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 left-0 w-40 h-40 bg-gradient-to-br from-amber-300 to-orange-300 rounded-full -translate-x-20 -translate-y-20"></div>
                        <div class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-tl from-orange-300 to-red-300 rounded-full translate-x-16 translate-y-16"></div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Enhanced Icon -->
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-amber-500 to-orange-600 rounded-3xl flex items-center justify-center shadow-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                            <svg class="w-10 h-10 text-white group-hover:scale-125 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>

                        <h3 class="text-3xl font-black text-gray-900 mb-6 group-hover:text-amber-700 transition-colors duration-300">Tidak Menemukan Yang Anda Cari?</h3>
                        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                            Tim ahli kami siap membantu Anda menemukan furniture yang sempurna untuk kebutuhan spesifik Anda.
                            <span class="font-bold text-amber-600">Konsultasi gratis</span> dan <span class="font-bold text-amber-600">rekomendasi personal</span> tersedia!
                        </p>

                        <!-- Enhanced Button -->
                        <button class="relative bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-black py-4 px-10 rounded-2xl transition-all duration-500 shadow-xl hover:shadow-2xl hover:scale-105 transform group/btn overflow-hidden">
                            <!-- Button shine effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-1000"></div>

                            <span class="relative flex items-center gap-3">
                                <svg class="w-6 h-6 group-hover/btn:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Konsultasi Gratis Sekarang
                                <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </button>

                        <!-- Trust indicators -->
                        <div class="mt-8 flex items-center justify-center gap-8 text-sm text-gray-500">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span>Respons Cepat</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span>Expert Advice</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span>Custom Solution</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products Section - Professional Enhanced Design -->
    <div id="products" class="py-16 md:py-24 lg:py-32 bg-gray-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-10 right-10 w-32 h-32 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full opacity-10 animate-floating"></div>
            <div class="absolute bottom-10 left-10 w-24 h-24 bg-gradient-to-br from-orange-100 to-amber-100 rounded-full opacity-10 animate-floating delay-300"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Enhanced Header -->
            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold text-gray-900 mb-6 animate-fadeInUp">
                    Koleksi <span class="text-amber-600">Furniture Unggulan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed animate-fadeInUp delay-200">
                    Pilihan furniture premium terpilih yang menggabungkan keahlian pengrajin luar biasa dengan estetika desain modern.
                    Setiap produk dipilih secara khusus untuk <span class="font-semibold text-amber-600">kualitas</span> dan <span class="font-semibold text-amber-600">keindahan</span> yang berkelanjutan.
                </p>

                <!-- Enhanced Filter/Search Bar -->
                <div class="mt-12 max-w-2xl mx-auto">
                    <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <input type="text" placeholder="Cari furniture impian Anda..." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent smooth-transition">
                            </div>
                            <button class="bg-amber-600 hover:bg-amber-700 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 transform">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Cari
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @if($products->isEmpty())
                <!-- Enhanced Empty State -->
                <div class="text-center py-20">
                    <div class="relative mb-8">
                        <div class="w-32 h-32 mx-auto bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-16 h-16 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <!-- Floating elements -->
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-amber-200 rounded-full animate-floating"></div>
                        <div class="absolute -bottom-2 -left-2 w-6 h-6 bg-orange-200 rounded-full animate-floating delay-300"></div>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Belum Ada Produk yang Sesuai</h3>
                    <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">Jangan khawatir! Coba sesuaikan pencarian Anda atau jelajahi kategori kami yang beragam untuk menemukan furniture impian Anda.</p>

                    <div class="space-y-4">
                        <button class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 transform">
                            Jelajahi Semua Kategori
                        </button>
                        <p class="text-gray-500">atau</p>
                        <button class="border-2 border-amber-600 text-amber-600 hover:bg-amber-600 hover:text-white font-bold py-3 px-6 rounded-xl transition-all duration-300">
                            Hubungi Tim Kami
                        </button>
                    </div>
                </div>
            @else
                <!-- Enhanced Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8 lg:gap-10">
                    @foreach($products as $index => $product)
                    <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-amber-200 hover-lift smooth-transition animate-fadeInUp flex flex-col"
                         style="animation-delay: {{ ($index * 100) + 400 }}ms; height: 400px;">

                        <!-- Enhanced Product Image -->
                        <div class="relative bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden" style="height: 180px;">
                            @if($product->gambar && file_exists(public_path('assets/img/' . $product->gambar)))
                                <img src="{{ asset('assets/img/' . $product->gambar) }}"
                                     alt="{{ $product->nama_produk }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                    <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Enhanced Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-2 bg-white/95 backdrop-blur-sm text-amber-600 text-sm font-bold rounded-full shadow-lg border border-white/50">
                                    {{ $product->kategori }}
                                </span>
                            </div>

                            <!-- Enhanced Quick Actions -->
                            <div class="absolute top-4 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <button class="w-12 h-12 bg-white/95 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-300 shadow-lg hover:scale-110">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-12 h-12 bg-white/95 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-300 shadow-lg hover:scale-110">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Enhanced Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                        </div>

                        <!-- Enhanced Product Info -->
                        <div class="p-3 flex-1">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 line-clamp-2 group-hover:text-amber-600 transition-colors duration-300">{{ $product->nama_produk }}</h3>

                            <div class="text-lg font-bold text-amber-600 mb-2">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-2.5 h-2.5 text-amber-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                    <span class="text-xs text-gray-500 ml-1">(4.9)</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs font-semibold text-green-600">✓ Siap Kirim</div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Action Buttons - Professional positioning -->
                        <div class="px-3 pb-3">
                            <div class="flex gap-1.5">
                                @auth
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 transform text-sm">
                                            <span class="flex items-center justify-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                </svg>
                                                Tambah ke Keranjang
                                            </span>
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 transform text-center text-sm">
                                        <span class="flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                            </svg>
                                            Masuk untuk Beli
                                        </span>
                                    </a>
                                @endauth

                                <a href="{{ route('produk.show', $product->id) }}" class="border border-amber-600 text-amber-600 hover:bg-amber-600 font-semibold py-2 px-2.5 rounded-lg transition-all duration-300 hover:scale-105 inline-flex items-center justify-center group">
                                    <svg class="w-4 h-4 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Customer Testimonials -->
    <div class="py-16 md:py-24 lg:py-32 bg-amber-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Apa Kata Pelanggan Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Feedback nyata dari pelanggan yang puas yang telah mengubah rumah mereka dengan koleksi furniture premium kami.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed italic">
                        "Furniture berkualitas luar biasa! Desain yang elegan dan sesuai dengan ruang tamu minimalis kami.
                        Pelayanan juga sangat memuaskan, dari konsultasi hingga pemasangan."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">SA</span>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Sarah Andini</div>
                            <div class="text-sm text-gray-600">Homeowner, Pangandaran</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed italic">
                        "Saya sangat puas dengan pembelian kitchen set di sini. Kualitas kayu sangat baik, finishing rapi,
                        dan hasil akhirnya sesuai ekspektasi. Terima kasih tim Meubel Dua Putra!"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">BH</span>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Budi Hermawan</div>
                            <div class="text-sm text-gray-600">Restaurant Owner</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed italic">
                        "Pelayanan luar biasa! Dari survey, produksi, hingga pemasangan semua profesional.
                        Furniture kamar tidur custom yang kami pesan hasilnya melebihi ekspektasi."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">DP</span>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Dian Pertiwi</div>
                            <div class="text-sm text-gray-600">Interior Designer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call-to-Action Section -->
    <div class="bg-gradient-to-br from-amber-600 to-orange-600 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Siap Mengubah Rumah Anda?
            </h2>
            <p class="text-xl text-amber-100 mb-10 max-w-2xl mx-auto leading-relaxed">
                Bergabunglah dengan ribuan pelanggan yang puas yang telah menciptakan ruang impian mereka dengan furniture premium kami.
                Mulai perjalanan transformasi Anda hari ini.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#products" class="inline-flex items-center gap-3 px-8 py-4 bg-white text-amber-600 font-bold rounded-xl hover:bg-amber-50 transition-colors shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Belanja Koleksi Kami
                </a>

                <button type="button" data-open-chat class="inline-flex items-center gap-3 px-8 py-4 border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-amber-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Konsultasi Gratis
                </button>
            </div>
        </div>
    </div>

    <!-- Trust Indicators -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="group hover:scale-105 transition-transform duration-300">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Kualitas Terjamin</h4>
                    <p class="text-gray-600 text-sm">Hanya bahan premium</p>
                </div>

                <div class="group hover:scale-105 transition-transform duration-300">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Gratis Ongkir</h4>
                    <p class="text-gray-600 text-sm">Wilayah Pangandaran</p>
                </div>

                <div class="group hover:scale-105 transition-transform duration-300">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Dukungan 24/7</h4>
                    <p class="text-gray-600 text-sm">Selalu siap membantu</p>
                </div>

                <div class="group hover:scale-105 transition-transform duration-300">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Layanan Cepat</h4>
                    <p class="text-gray-600 text-sm">Pengiriman cepat</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript for Interactivity -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling for anchor links
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

            // Animated counter function
            function animateCounter(element, target, duration = 2000) {
                const start = 0;
                const increment = target / (duration / 16);
                let current = start;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }

                    // Format number with appropriate suffix
                    let displayValue = Math.floor(current);
                    if (target >= 1000) {
                        displayValue = (displayValue / 1000).toFixed(displayValue < 1000 ? 0 : 1) + 'K';
                    }
                    if (target < 100 && target >= 20) {
                        displayValue = Math.floor(current) + '+';
                    }
                    if (target < 20) {
                        displayValue = Math.floor(current) + '+';
                    }

                    element.textContent = displayValue;
                }, 16);
            }

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Add animation classes
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';

                        // Trigger counter animation
                        if (entry.target.classList.contains('counter')) {
                            const target = parseInt(entry.target.dataset.target);
                            animateCounter(entry.target, target);
                        }

                        // Remove observer after animation
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe elements with animation classes
            document.querySelectorAll('.animate-fadeInUp, .animate-slideInLeft, .animate-slideInRight, .counter').forEach(el => {
                if (el.classList.contains('animate-fadeInUp') || el.classList.contains('animate-slideInLeft') || el.classList.contains('animate-slideInRight')) {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(30px)';
                }
                observer.observe(el);
            });

            // Add hover sound effects (subtle click sounds)
            document.querySelectorAll('.hover-lift, .hover-scale').forEach(element => {
                element.addEventListener('mouseenter', function() {
                    this.style.transform = this.classList.contains('hover-lift') ?
                        'translateY(-8px) scale(1.02)' : 'scale(1.05)';
                });

                element.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            });

            // Enhanced search form interaction
            const searchInputs = document.querySelectorAll('input, select');
            searchInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-amber-400');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-amber-400');
                });
            });

            // Parallax effect for background elements
            let ticking = false;

            function updateParallax() {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.animate-floating');

                parallaxElements.forEach(el => {
                    const speed = 0.2;
                    const yPos = -(scrolled * speed);
                    el.style.transform = `translateY(${yPos}px)`;
                });

                ticking = false;
            }

            function requestParallaxTick() {
                if (!ticking) {
                    requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            }

            window.addEventListener('scroll', requestParallaxTick);

            // Add subtle shake animation to buttons on click
            document.querySelectorAll('button, .btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.style.animation = 'shake 0.3s ease-in-out';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 300);
                });
            });

            // Progressive image loading
            const images = document.querySelectorAll('img[data-src]');
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('opacity-0');
                        img.classList.add('opacity-100');
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));

            // Add typing effect to headlines (subtle)
            const headlines = document.querySelectorAll('h1 span');
            headlines.forEach((headline, index) => {
                setTimeout(() => {
                    headline.style.opacity = '1';
                    headline.style.transform = 'translateY(0)';
                }, index * 200);
            });

            // Interactive feature cards
            const featureCards = document.querySelectorAll('.group');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    // Add subtle glow effect
                    this.style.boxShadow = '0 20px 40px rgba(245, 158, 11, 0.1)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.boxShadow = '';
                });
            });
        });

        // CSS for shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-2px); }
                75% { transform: translateX(2px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</x-app-layout>
