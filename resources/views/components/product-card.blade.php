@props(['product'])

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
