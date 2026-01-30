<x-app-layout>
    <!-- CSS untuk Animation Classes -->
    <style nonce="{{ $cspNonce ?? '' }}">
        /* Enhanced Animation Classes */
        .animate-fadeInUp {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border: 1px solid transparent;
            background-clip: padding-box;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(251, 191, 36, 0.2), transparent);
            transition: left 0.6s ease;
            z-index: 2;
        }

        .product-card:hover::before {
            left: 100%;
        }

        .product-card:hover {
            transform: translateY(-20px) scale(1.02);
            box-shadow:
                0 30px 60px -20px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(251, 191, 36, 0.1),
                0 0 40px rgba(251, 191, 36, 0.1);
            border-color: rgba(251, 191, 36, 0.2);
        }

        .product-image {
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.05) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .product-card:hover .product-image::after {
            opacity: 1;
        }

        .badge-floating {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 10;
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .price-highlight {
            background: linear-gradient(135deg, #f59e0b, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            border: none;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.4);
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        }

        .product-title {
            transition: color 0.3s ease;
            font-weight: 700;
            line-height: 1.3;
        }

        .product-card:hover .product-title {
            color: #f59e0b;
        }

        .product-description {
            color: #6b7280;
            line-height: 1.6;
        }

        .card-content {
            position: relative;
            z-index: 3;
        }

        /* Animation delay classes */
        .delay-0 { animation-delay: 0ms; }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }
        .delay-500 { animation-delay: 500ms; }
        .delay-600 { animation-delay: 600ms; }
        .delay-700 { animation-delay: 700ms; }
        .delay-800 { animation-delay: 800ms; }
        .delay-900 { animation-delay: 900ms; }
        .delay-1000 { animation-delay: 1000ms; }
        .delay-1100 { animation-delay: 1100ms; }
        .delay-1200 { animation-delay: 1200ms; }
    </style>

    <div class="bg-gradient-to-br from-amber-50 via-white to-orange-50 min-h-screen">
        <!-- Hero Section -->
        <section class="relative py-16 bg-gradient-to-r from-amber-500 via-orange-400 to-amber-600">
            <div class="absolute inset-0 bg-black/20"></div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
                <div class="animate-fadeInUp">
                    <h1 class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        Koleksi <span class="text-amber-100">Furniture</span> Premium
                    </h1>
                    <p class="text-xl text-amber-100 max-w-3xl mx-auto leading-relaxed">
                        Temukan furniture berkualitas tinggi untuk melengkapi rumah impian Anda dengan gaya dan kenyamanan yang sempurna
                    </p>
                </div>
            </div>
        </section>

        <!-- Products Grid Section -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                @if($produks->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 lg:gap-10">
                        @foreach($produks as $index => $produk)
                            <article class="product-card bg-white rounded-3xl shadow-2xl border-0 overflow-hidden animate-fadeInUp delay-{{ ($index % 4) * 150 }} group">
                                <div class="relative overflow-hidden">
                                    @if($produk->kategori)
                                        <div class="badge-floating">
                                            {{ $produk->kategori }}
                                        </div>
                                    @endif

                                    @if($produk->gambar)
                                        <div class="product-image w-full h-80 bg-cover bg-center"
                                             style="background-image: url('{{ asset('storage/' . $produk->gambar) }}')"></div>
                                    @else
                                        <div class="product-image w-full h-80 bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 flex items-center justify-center">
                                            <div class="text-center">
                                                <svg class="w-24 h-24 text-amber-300 mx-auto mb-3 group-hover:text-amber-400 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <p class="text-amber-400 font-medium text-sm">No Image</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Wishlist Icon -->
                                    <div class="absolute top-4 right-4 w-10 h-10 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="card-content p-8">
                                    <!-- Product Title -->
                                    <h3 class="product-title text-2xl font-bold text-gray-900 mb-3 line-clamp-2">
                                        {{ $produk->nama }}
                                    </h3>

                                    <!-- Product Description -->
                                    <p class="product-description text-sm mb-6 line-clamp-3">
                                        {{ $produk->deskripsi }}
                                    </p>

                                    <!-- Price Section -->
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="price-section">
                                            <span class="text-sm text-gray-500 font-medium block mb-1">Harga Mulai</span>
                                            <div class="price-highlight text-3xl font-extrabold">
                                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <!-- Stock Indicator -->
                                        <div class="flex flex-col items-end">
                                            <div class="flex items-center gap-2 mb-1">
                                                <div class="w-3 h-3 bg-gradient-to-r from-emerald-400 to-emerald-500 rounded-full shadow-lg animate-pulse"></div>
                                                <span class="text-sm text-emerald-600 font-semibold">Ready</span>
                                            </div>
                                            <span class="text-xs text-gray-400">Stock tersedia</span>
                                        </div>
                                    </div>

                                    <!-- Product Features -->
                                    <div class="flex flex-wrap gap-2 mb-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Premium Quality
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Garansi 1 Tahun
                                        </span>
                                    </div>
                                    </h3>

                                    <!-- Product Description -->
                                    <p class="product-description text-sm mb-6 line-clamp-3">
                                        {{ $produk->deskripsi }}
                                    </p>

                                    <!-- Price Section -->
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="price-section">
                                            <span class="text-sm text-gray-500 font-medium block mb-1">Harga Mulai</span>
                                            <div class="price-highlight text-3xl font-extrabold">
                                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <!-- Stock Indicator -->
                                        <div class="flex flex-col items-end">
                                            <div class="flex items-center gap-2 mb-1">
                                                <div class="w-3 h-3 bg-gradient-to-r from-emerald-400 to-emerald-500 rounded-full shadow-lg animate-pulse"></div>
                                                <span class="text-sm text-emerald-600 font-semibold">Ready</span>
                                            </div>
                                            <span class="text-xs text-gray-400">Stock tersedia</span>
                                        </div>
                                    </div>

                                    <!-- Product Features -->
                                    <div class="flex flex-wrap gap-2 mb-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Premium Quality
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Garansi 1 Tahun
                                        </span>
                                    </div>

                                    <!-- Action Button -->
                                    @auth
                                        @if(auth()->user()->role !== 'admin')
                                            <form action="{{ route('cart.add', $produk->id) }}" method="POST" class="ajax-add-to-cart">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn-primary w-full px-6 py-4 rounded-2xl font-bold text-sm flex items-center justify-center gap-3 group">
                                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.8-9M7 13l-2.3 2.3c-.4.4-.4 1 0 1.4l1.4 1.4c.4.4 1 .4 1.4 0L9 16"></path>
                                                    </svg>
                                                    Tambah ke Keranjang
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('produk.show', $produk->id) }}" class="btn-primary w-full block px-6 py-4 rounded-2xl font-bold text-sm text-center">
                                                <div class="flex items-center justify-center gap-3">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Lihat Detail Produk
                                                </div>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn-primary w-full block px-6 py-4 rounded-2xl font-bold text-sm text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                                </svg>
                                                Masuk untuk Membeli
                                            </div>
                                        </a>
                                    @endauth
                                </div>
                            </article>
                        @endforeach
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn-primary w-full block px-6 py-4 rounded-2xl font-bold text-sm text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                                </svg>
                                                Masuk untuk Membeli
                                            </div>
                                        </a>
                                    @endauth
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($produks->hasPages())
                        <div class="mt-12">
                            {{ $produks->links() }}
                        </div>
                    @endif
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 rounded-full mb-6">
                            <svg class="w-10 h-10 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Produk</h3>
                        <p class="text-gray-600 max-w-md mx-auto">
                            Produk sedang dalam proses penambahan. Silakan kembali lagi nanti untuk melihat koleksi furniture terbaru kami.
                        </p>
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-app-layout>
