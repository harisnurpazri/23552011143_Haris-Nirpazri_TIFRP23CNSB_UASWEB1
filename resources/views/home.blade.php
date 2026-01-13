<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-amber-900 via-amber-800 to-yellow-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    Furniture Berkualitas untuk Rumah Impian Anda
                </h1>
                <p class="text-lg lg:text-xl text-amber-100 mb-8 max-w-3xl mx-auto">
                    Desain elegan, kayu pilihan terbaik, dan craftsmanship yang sempurna
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#products" class="inline-flex items-center px-6 py-3 bg-white text-amber-900 font-bold rounded-lg hover:bg-amber-100 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Belanja Sekarang
                    </a>
                    <a href="{{ route('edukasi.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white/10 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <!-- Search -->
            <div class="mt-12 max-w-2xl mx-auto">
                <form action="{{ route('home') }}" method="GET" class="flex flex-col sm:flex-row gap-3 bg-white/10 backdrop-blur p-4 rounded-xl preserve-scroll">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ $search ?? '' }}"
                        placeholder="Cari produk furniture..." 
                        class="flex-1 px-4 py-3 rounded-lg border-0 text-gray-900 placeholder-gray-500"
                    >
                    <select name="kategori" class="px-4 py-3 rounded-lg border-0 text-gray-900">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ ($selectedKategori ?? '') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-lg transition">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-12 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl font-bold text-amber-700">5000+</div>
                    <div class="text-gray-600">Pelanggan Puas</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-amber-700">500+</div>
                    <div class="text-gray-600">Produk Furniture</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-amber-700">15+</div>
                    <div class="text-gray-600">Tahun Pengalaman</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-amber-700">4.9</div>
                    <div class="text-gray-600">Rating Pelanggan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Grid -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold mb-4">KATEGORI</span>
                <h2 class="text-3xl font-bold text-gray-900">Jelajahi Berdasarkan Kategori</h2>
                <p class="text-gray-600 mt-2">Temukan furniture sesuai kebutuhan ruangan Anda</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($categories as $cat)
                <a href="{{ route('home', ['kategori' => $cat]) }}" 
                   class="bg-white p-6 rounded-xl text-center hover:shadow-lg hover:-translate-y-1 transition-all border border-gray-100">
                    <div class="w-12 h-12 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h5 class="font-semibold text-gray-900">{{ $cat }}</h5>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div id="products" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold mb-4">KOLEKSI KAMI</span>
                <h2 class="text-3xl font-bold text-gray-900">Produk Unggulan</h2>
                <p class="text-gray-600 mt-2">Dipilih khusus untuk Anda dengan standar kualitas terbaik</p>
            </div>

            @if($products->isEmpty())
                <div class="text-center py-12">
                    <div class="text-gray-400 text-6xl mb-4">📦</div>
                    <p class="text-gray-600">Tidak ada produk ditemukan</p>
                    <a href="{{ route('home') }}" class="inline-block mt-4 text-amber-600 hover:underline">Reset filter</a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all group overflow-hidden">
                        <!-- Product Image -->
                        <div class="relative h-56 bg-gray-100 overflow-hidden">
                            @if($product->gambar && file_exists(public_path('assets/img/' . $product->gambar)))
                                <img src="{{ asset('assets/img/' . $product->gambar) }}" 
                                     alt="{{ $product->nama_produk }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Category Badge -->
                            <span class="absolute top-3 right-3 px-3 py-1 bg-white/90 text-amber-800 text-xs font-semibold rounded-full">
                                {{ $product->kategori }}
                            </span>

                            @if($product->isNew())
                                <span class="absolute top-3 left-3 px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">
                                    New
                                </span>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-5">
                            <h3 class="font-bold text-gray-900 mb-2 line-clamp-1">{{ $product->nama_produk }}</h3>
                            <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ $product->deskripsi }}</p>
                            
                            <!-- Stock Status -->
                            @if($product->stok > 10)
                                <span class="inline-flex items-center text-green-600 text-xs mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Stok Tersedia
                                </span>
                            @elseif($product->stok > 0)
                                <span class="inline-flex items-center text-yellow-600 text-xs mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Sisa {{ $product->stok }} unit
                                </span>
                            @else
                                <span class="inline-flex items-center text-red-600 text-xs mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Stok Habis
                                </span>
                            @endif

                            <!-- Price -->
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-amber-700">{{ $product->formatted_harga }}</span>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2 mt-4">
                                <a href="{{ route('produk.show', $product->id) }}" 
                                   class="flex-1 py-2 px-4 text-center border border-amber-600 text-amber-600 font-semibold rounded-lg hover:bg-amber-50 transition">
                                    Detail
                                </a>
                                @auth
                                    @if($product->stok > 0)
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1 ajax-add-to-cart">
                                        @csrf
                                        <button type="submit" class="w-full py-2 px-4 bg-amber-600 text-white font-semibold rounded-lg hover:bg-amber-700 transition">
                                            + Keranjang
                                        </button>
                                    </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="flex-1 py-2 px-4 text-center bg-amber-600 text-white font-semibold rounded-lg hover:bg-amber-700 transition">
                                        + Keranjang
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Pengiriman Aman</h4>
                    <p class="text-gray-600 text-sm">Gratis ongkir area Pangandaran</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Kualitas Premium</h4>
                    <p class="text-gray-600 text-sm">Kayu pilihan berstandar tinggi</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Layanan 24/7</h4>
                    <p class="text-gray-600 text-sm">Customer service responsif</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Garansi Produk</h4>
                    <p class="text-gray-600 text-sm">Warranty 1 tahun</p>
                </div>
            </div>
        </div>
    </div>

    @</x-app-layout>
