<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Detail Pesanan #{{ $order->order_id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-gray-900 font-semibold">
            ← Kembali
        </a>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Order Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Items -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b bg-gray-50">
                    <h3 class="font-bold text-gray-900">Item Pesanan</h3>
                </div>
                <div class="divide-y">
                    @foreach($order->items as $item)
                    <div class="p-4 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                @php
                                    $product = \App\Models\Produk::find($item['id']);
                                @endphp
                                @if($product && $product->gambar && file_exists(public_path('assets/img/' . $product->gambar)))
                                    <img src="{{ asset('assets/img/' . $product->gambar) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $item['nama_produk'] }}</p>
                                <p class="text-sm text-gray-500">{{ $item['qty'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <p class="font-bold text-gray-900">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="p-4 bg-gray-50 text-right">
                    <span class="text-gray-600 mr-4">Total Pesanan:</span>
                    <span class="text-xl font-bold text-amber-700">{{ $order->formatted_total }}</span>
                </div>
            </div>

            <!-- Customer Chat (Placeholder) -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-bold text-gray-900 mb-4">Catatan/Pesan</h3>
                <p class="text-gray-500 italic">Belum ada fitur pesan/catatan khusus untuk order ini.</p>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Update -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-bold text-gray-900 mb-4">Status Pesanan</h3>
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring-amber-500">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-amber-600 text-white font-bold py-2 rounded-lg hover:bg-amber-700 transition">
                        Update Status
                    </button>
                </form>
            </div>

            <!-- Customer Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-bold text-gray-900 mb-4">Informasi Pelanggan</h3>
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                        <span class="text-xl font-bold text-gray-600">{{ substr($order->user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">{{ $order->user->name }}</p>
                        <p class="text-sm text-gray-500">Customer</p>
                    </div>
                </div>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center text-gray-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        {{ $order->user->email }}
                    </div>
                    <div class="flex items-center text-gray-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Bergabung: {{ $order->user->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
