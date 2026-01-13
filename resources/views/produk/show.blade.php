<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="{{ route('home') }}" class="hover:text-amber-600">Home</a></li>
                    <li><span>/</span></li>
                    <li><a href="{{ route('home') }}" class="hover:text-amber-600">Produk</a></li>
                    <li><span>/</span></li>
                    <li class="text-amber-700 font-medium">{{ $produk->nama_produk }}</li>
                </ol>
            </nav>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="relative">
                    <div class="bg-gray-100 rounded-2xl overflow-hidden aspect-square">
                        @if($produk->gambar && file_exists(public_path('assets/img/' . $produk->gambar)))
                            <img src="{{ asset('assets/img/' . $produk->gambar) }}" 
                                 alt="{{ $produk->nama_produk }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    @if($produk->isNew())
                        <span class="absolute top-4 left-4 px-4 py-2 bg-green-500 text-white text-sm font-bold rounded-full">
                            Produk Baru
                        </span>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="bg-white rounded-2xl p-8 shadow-sm">
                    <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-sm font-semibold rounded-full mb-4">
                        {{ $produk->kategori }}
                    </span>

                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $produk->nama_produk }}</h1>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-700 mb-2">Deskripsi Produk</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $produk->deskripsi }}</p>
                    </div>

                    <!-- Price -->
                    <div class="bg-amber-50 rounded-xl p-4 mb-6">
                        <span class="text-sm text-gray-500">Harga</span>
                        <div class="text-3xl font-bold text-amber-700">{{ $produk->formatted_harga }}</div>
                    </div>

                    <!-- Stock Status -->
                    <div class="mb-6">
                        @if($produk->stok > 10)
                            <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-full">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Stok Tersedia ({{ $produk->stok }} unit)
                            </span>
                        @elseif($produk->stok > 0)
                            <span class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92z" clip-rule="evenodd"></path>
                                </svg>
                                Stok Terbatas ({{ $produk->stok }} unit)
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-full">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                Stok Habis
                            </span>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="space-y-3">
                        @auth
                            @if($produk->stok > 0)
                            <form action="{{ route('cart.add', $produk->id) }}" method="POST" class="ajax-add-to-cart">
                                @csrf
                                <button type="submit" class="w-full py-4 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl transition flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Tambah ke Keranjang
                                </button>
                            </form>
                            @else
                            <button disabled class="w-full py-4 bg-gray-400 text-white font-bold rounded-xl cursor-not-allowed">
                                Produk Tidak Tersedia
                            </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="block w-full py-4 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl transition text-center">
                                Login untuk Membeli
                            </a>
                        @endauth

                        <a href="{{ route('home') }}" class="block w-full py-4 border-2 border-gray-300 hover:border-gray-400 text-gray-700 font-semibold rounded-xl transition text-center">
                            ← Kembali ke Katalog
                        </a>
                    </div>

                    <!-- Features -->
                    <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t">
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Gratis Ongkir</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Garansi 1 Tahun</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900">CS 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
