<x-app-layout>
    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb with Animation -->
            <nav class="mb-6 animate-fade-in" data-animate>
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="{{ route('home') }}" class="hover:text-amber-600 transition">🏠 Home</a></li>
                    <li><span class="text-gray-400">/</span></li>
                    <li><a href="{{ route('home') }}" class="hover:text-amber-600 transition">Produk</a></li>
                    <li><span class="text-gray-400">/</span></li>
                    <li class="text-amber-700 font-medium">{{ $produk->nama_produk }}</li>
                </ol>
            </nav>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Product Image with Enhanced Effects -->
                <div class="relative animate-fade-in stagger-1" data-animate>
                    <div class="bg-white rounded-2xl overflow-hidden aspect-square shadow-lg sticky top-8 image-zoom-container border border-gray-200">
                        @if($produk->gambar && file_exists(public_path('assets/img/' . $produk->gambar)))
                            <img src="{{ asset('assets/img/' . $produk->gambar) }}" 
                                 alt="{{ $produk->nama_produk }}"
                                 class="w-full h-full object-cover cursor-pointer"
                                 data-lightbox>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gradient-to-br from-gray-50 to-gray-100">
                                <div class="text-center">
                                    <svg class="w-32 h-32 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-500">No Image Available</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($produk->isNew())
                        <span class="absolute top-6 left-6 px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white text-sm font-bold rounded-full shadow-lg badge-pulse">
                            ✨ Produk Baru
                        </span>
                    @endif
                </div>

                <!-- Product Info with Enhanced Styling -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-200 animate-fade-in stagger-2" data-animate>
                    <span class="inline-block px-4 py-1.5 bg-gradient-to-r from-amber-100 to-amber-200 text-amber-800 text-sm font-semibold rounded-full mb-4 shadow-sm">
                        📦 {{ $produk->kategori }}
                    </span>

                    <h1 class="text-4xl font-bold text-gray-900 mb-4 gradient-text">{{ $produk->nama_produk }}</h1>

                    <div class="mb-6 p-6 bg-gray-50 rounded-xl border border-gray-200">
                        <h3 class="font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Deskripsi Produk
                        </h3>
                        <p class="text-gray-600 leading-relaxed">{{ $produk->deskripsi }}</p>
                    </div>

                    <!-- Price with Enhanced Design -->
                    <div class="bg-gradient-to-br from-amber-50 to-yellow-50 rounded-2xl p-6 mb-6 border-2 border-amber-200 shadow-md hover-lift">
                        <span class="text-sm text-gray-600 font-medium">Harga Spesial</span>
                        <div class="flex items-baseline gap-2">
                            <div class="text-4xl font-bold bg-gradient-to-r from-amber-600 to-amber-700 bg-clip-text text-transparent">
                                {{ $produk->formatted_harga }}
                            </div>
                            <span class="text-sm text-gray-500 line-through">Rp {{ number_format($produk->harga * 1.2, 0, ',', '.') }}</span>
                            <span class="px-2 py-1 bg-red-500 text-white text-xs font-bold rounded-full">-17%</span>
                        </div>
                    </div>

                    <!-- Stock Status with Enhanced Icons -->
                    <div class="mb-6">
                        @if($produk->stok > 10)
                            <div class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-green-100 to-green-200 text-green-700 rounded-xl font-semibold shadow-sm">
                                <svg class="w-6 h-6 mr-2 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                ✅ Stok Tersedia ({{ $produk->stok }} unit)
                            </div>
                        @elseif($produk->stok > 0)
                            <div class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-700 rounded-xl font-semibold shadow-sm badge-pulse">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92z" clip-rule="evenodd"></path>
                                </svg>
                                ⚠️ Stok Terbatas ({{ $produk->stok }} unit tersisa)
                            </div>
                        @else
                            <div class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-red-100 to-red-200 text-red-700 rounded-xl font-semibold shadow-sm">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                ❌ Stok Habis
                            </div>
                        @endif
                    </div>

                    <!-- Actions with Enhanced Buttons -->
                    <div class="space-y-3">
                        @auth
                            @if($produk->stok > 0)
                            <form action="{{ route('cart.add', $produk->id) }}" method="POST" class="ajax-add-to-cart">
                                @csrf
                                <button type="submit" class="w-full py-4 bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-bold rounded-xl transition-all flex items-center justify-center gap-2 shadow-lg hover-lift ripple-button text-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Tambah ke Keranjang
                                </button>
                            </form>
                            @else
                            <button disabled class="w-full py-4 bg-gray-400 text-white font-bold rounded-xl cursor-not-allowed opacity-60 text-lg">
                                ❌ Produk Tidak Tersedia
                            </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="block w-full py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold rounded-xl transition text-center shadow-lg hover-lift text-lg">
                                🔐 Login untuk Membeli
                            </a>
                        @endauth

                        <a href="{{ route('home') }}" class="block w-full py-4 border-2 border-gray-300 hover:border-amber-600 text-gray-700 hover:text-amber-700 font-semibold rounded-xl transition text-center hover-lift flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Katalog
                        </a>
                    </div>

                    <!-- Features with Enhanced Icons -->
                    <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t">
                        <div class="text-center group hover-lift p-3 rounded-lg hover:bg-amber-50 transition">
                            <div class="w-12 h-12 mx-auto bg-gradient-to-br from-amber-100 to-amber-200 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900 group-hover:text-amber-700 transition">Gratis Ongkir</p>
                        </div>
                        <div class="text-center group hover-lift p-3 rounded-lg hover:bg-amber-50 transition">
                            <div class="w-12 h-12 mx-auto bg-gradient-to-br from-amber-100 to-amber-200 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900 group-hover:text-amber-700 transition">Garansi 1 Tahun</p>
                        </div>
                        <div class="text-center group hover-lift p-3 rounded-lg hover:bg-amber-50 transition">
                            <div class="w-12 h-12 mx-auto bg-gradient-to-br from-amber-100 to-amber-200 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900 group-hover:text-amber-700 transition">CS 24/7</p>
                        </div>
                    </div>

                    <!-- Product Specifications -->
                    <div class="mt-8 pt-8 border-t">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Spesifikasi Produk
                        </h3>
                        <div class="space-y-2">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Kategori</span>
                                <span class="font-semibold text-gray-900">{{ $produk->kategori }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Stok</span>
                                <span class="font-semibold text-gray-900">{{ $produk->stok }} Unit</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Material</span>
                                <span class="font-semibold text-gray-900">Kayu Premium</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">Kondisi</span>
                                <span class="font-semibold text-green-600">100% Baru</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
