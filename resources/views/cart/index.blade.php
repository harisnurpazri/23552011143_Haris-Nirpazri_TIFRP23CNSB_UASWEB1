<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Keranjang Belanja
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @if(empty($items))
                <div class="bg-white rounded-2xl p-12 text-center shadow-sm">
                    <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Keranjang Anda Kosong</h3>
                    <p class="text-gray-600 mb-6">Belum ada produk yang ditambahkan. Mulai belanja sekarang!</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Mulai Belanja
                    </a>
                </div>
            @else
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                            <div class="p-6 border-b bg-gray-50">
                                <h3 class="font-bold text-gray-900">Produk dalam Keranjang ({{ count($items) }} item)</h3>
                            </div>
                            <div class="divide-y">
                                @foreach($items as $item)
                                <div class="p-6 flex items-center gap-4">
                                    <!-- Image -->
                                    <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                        @if($item['product']->gambar && file_exists(public_path('assets/img/' . $item['product']->gambar)))
                                            <img src="{{ asset('assets/img/' . $item['product']->gambar) }}" 
                                                 alt="{{ $item['product']->nama_produk }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Info -->
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 truncate">{{ $item['product']->nama_produk }}</h4>
                                        <p class="text-sm text-gray-500">{{ $item['product']->formatted_harga }}</p>
                                    </div>

                                    <!-- Qty -->
                                    <div class="flex items-center gap-2">
                                        <form action="{{ route('cart.update', $item['product']->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <button type="button" onclick="updateQty(this, -1)" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200">-</button>
                                            <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="w-12 text-center border-0 font-semibold">
                                            <button type="button" onclick="updateQty(this, 1)" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200">+</button>
                                            <button type="submit" class="ml-2 px-3 py-1 bg-amber-100 text-amber-700 text-sm rounded-lg hover:bg-amber-200">Update</button>
                                        </form>
                                    </div>

                                    <!-- Subtotal -->
                                    <div class="text-right">
                                        <span class="font-bold text-amber-700">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                                    </div>

                                    <!-- Remove -->
                                    <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Hapus produk ini?')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="inline-flex items-center text-amber-600 hover:text-amber-700 font-semibold">
                                ← Lanjut Belanja
                            </a>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div>
                        <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
                            <h3 class="font-bold text-gray-900 mb-4">Ringkasan Belanja</h3>
                            
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between text-gray-600">
                                    <span>Total Item:</span>
                                    <span>{{ count($items) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Jumlah Harga:</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="border-t pt-4 mb-6">
                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-900">Total Pembayaran</span>
                                    <span class="text-2xl font-bold text-amber-700">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <a href="{{ route('checkout') }}" class="block w-full py-4 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-center transition">
                                Lanjut ke Checkout
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function updateQty(btn, delta) {
            const input = btn.parentNode.querySelector('input[name="qty"]');
            let val = parseInt(input.value) + delta;
            if (val < 1) val = 1;
            input.value = val;
        }
    </script>
</x-app-layout>
