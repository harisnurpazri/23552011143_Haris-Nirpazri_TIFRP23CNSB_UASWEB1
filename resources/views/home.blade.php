    <!-- Hero Section (redesigned) -->
    <div class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 text-center lg:text-left">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">Furniture Berkualitas untuk Rumah Impian Anda</h1>
                    <p class="text-lg text-slate-300 max-w-2xl mb-8">Desain elegan, kayu pilihan terbaik, dan craftsmanship yang sempurna untuk setiap sudut rumah Anda.</p>
                    <div class="flex flex-col sm:flex-row gap-4 sm:justify-start justify-center">
                        <a href="#products" class="inline-flex items-center px-6 py-3 bg-amber-500 text-white font-semibold rounded-lg shadow-md hover:brightness-110 transition">
                            Belanja Sekarang
                        </a>
                        <a href="{{ route('edukasi.index') }}" class="inline-flex items-center px-6 py-3 border border-slate-700 text-slate-200 font-semibold rounded-lg hover:bg-white/5 transition">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    <!-- Search (redesigned) -->
                    <div class="mt-8">
                        <form action="{{ route('home') }}" method="GET" class="flex items-center gap-3 bg-white text-slate-900 rounded-2xl shadow-lg p-2 sm:p-3 preserve-scroll">
                            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari produk furniture..." class="flex-1 px-4 py-3 rounded-lg border-0 text-sm sm:text-base outline-none" />
                            <select name="kategori" class="px-4 py-2 rounded-md border-0 text-sm">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ ($selectedKategori ?? '') == $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="px-5 py-2 bg-amber-600 text-white rounded-lg font-semibold">Cari</button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-5 hidden lg:block">
                    <div class="relative">
                        <div class="h-96 rounded-3xl bg-gradient-to-br from-amber-800 via-amber-700 to-amber-600 shadow-2xl flex items-center justify-center">
                            <!-- Decorative product hero; keep functional integrity, no external images referenced -->
                            <div class="w-72 h-44 bg-white/10 rounded-2xl backdrop-blur-lg border border-white/5 flex items-center justify-center">
                                <svg class="w-24 h-24 text-white/90" fill="none" viewBox="0 0 64 64" stroke="currentColor"><rect x="8" y="12" width="48" height="36" rx="4" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <x-product-card :product="$product" />
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
