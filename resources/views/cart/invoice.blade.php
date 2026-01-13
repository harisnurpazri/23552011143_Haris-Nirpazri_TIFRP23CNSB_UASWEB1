<x-app-layout>
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-green-600 to-green-500 text-white text-center p-8">
                    <div class="w-20 h-20 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold mb-2">Pesanan Berhasil!</h1>
                    <p class="text-white/80">Terima kasih telah berbelanja di Meubeul Dua Putra</p>
                </div>

                <div class="p-8">
                    <!-- Invoice Header -->
                    <div class="flex justify-between items-start mb-8 pb-8 border-b">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-1">INVOICE</h2>
                            <p class="text-gray-500">#{{ $order->order_id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-500">Tanggal Pesanan</p>
                            <p class="font-semibold text-gray-900">{{ $order->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div class="mb-8">
                        <h3 class="font-semibold text-gray-900 mb-2">Informasi Pelanggan</h3>
                        <p class="text-gray-700">{{ $order->user->name }}</p>
                        <p class="text-gray-500">{{ $order->user->email }}</p>
                    </div>

                    <!-- Items -->
                    <div class="mb-8">
                        <h3 class="font-semibold text-gray-900 mb-4">Detail Pesanan</h3>
                        <div class="bg-gray-50 rounded-xl overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Produk</th>
                                        <th class="text-center px-4 py-3 text-sm font-semibold text-gray-700">Qty</th>
                                        <th class="text-right px-4 py-3 text-sm font-semibold text-gray-700">Harga</th>
                                        <th class="text-right px-4 py-3 text-sm font-semibold text-gray-700">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td class="px-4 py-3 text-gray-900">{{ $item['nama_produk'] }}</td>
                                        <td class="px-4 py-3 text-center text-gray-700">{{ $item['qty'] }}</td>
                                        <td class="px-4 py-3 text-right text-gray-700">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 text-right font-semibold text-gray-900">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="bg-amber-50 rounded-xl p-6 mb-8">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-gray-900">Total Pembayaran</span>
                            <span class="text-3xl font-bold text-amber-700">{{ $order->formatted_total }}</span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center justify-center gap-2 mb-8">
                        <span class="px-4 py-2 rounded-full text-sm font-semibold
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                            @elseif($order->status === 'completed') bg-green-100 text-green-700
                            @else bg-red-100 text-red-700
                            @endif">
                            Status: {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button onclick="window.print()" class="flex-1 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:border-gray-400 transition flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            Cetak Invoice
                        </button>
                        <a href="{{ route('home') }}" class="flex-1 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl transition flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
