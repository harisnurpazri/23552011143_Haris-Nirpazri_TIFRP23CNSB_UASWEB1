<x-app-layout>
    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-amber-700 to-amber-600 text-white text-center p-8">
                    <div class="w-16 h-16 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold mb-2">Konfirmasi Pembayaran</h1>
                    <p class="text-white/80">Periksa kembali pesanan Anda sebelum melanjutkan</p>
                </div>

                <div class="p-6">
                    <!-- Order Summary -->
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Ringkasan Pesanan
                    </h3>

                    <div class="bg-gray-50 rounded-xl p-4 mb-6 divide-y">
                        @foreach($items as $item)
                        <div class="py-3 flex justify-between items-center {{ !$loop->first ? '' : 'pt-0' }}">
                            <div>
                                <p class="font-medium text-gray-900">{{ $item['product']->nama_produk }}</p>
                                <p class="text-sm text-gray-500">{{ $item['qty'] }} × {{ $item['product']->formatted_harga }}</p>
                            </div>
                            <span class="font-semibold text-amber-700">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>

                    <!-- Total -->
                    <div class="bg-amber-50 rounded-xl p-4 mb-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-semibold text-gray-900">Total Pembayaran</span>
                                <p class="text-sm text-gray-500">{{ count($items) }} item produk</p>
                            </div>
                            <span class="text-2xl font-bold text-amber-700">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h4 class="font-semibold text-blue-800 mb-1">Mode Simulasi Pembayaran</h4>
                                <p class="text-sm text-blue-700">Ini adalah simulasi checkout. Tidak ada pembayaran riil yang akan diproses.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <form action="{{ route('checkout.process') }}" method="POST" class="space-y-3">
                        @csrf
                        <button type="submit" class="w-full py-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition flex items-center justify-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Konfirmasi & Selesaikan Pesanan
                        </button>
                        <a href="{{ route('cart.index') }}" class="block w-full py-4 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl text-center hover:border-gray-400 transition">
                            ← Kembali ke Keranjang
                        </a>
                    </form>

                    <!-- Security Note -->
                    <div class="mt-6 text-center text-sm text-gray-500">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Transaksi Anda aman dan terenkripsi
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
