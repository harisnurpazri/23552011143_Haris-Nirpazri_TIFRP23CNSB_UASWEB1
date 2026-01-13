<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Riwayat Penjualan</h1>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-xl p-4 shadow-sm mb-6">
        <form action="{{ route('admin.orders.index') }}" method="GET" class="flex gap-4 items-center">
            <label class="text-gray-700 font-medium">Filter Status:</label>
            <select name="status" onchange="this.form.submit()" class="px-4 py-2 border rounded-lg">
                <option value="">Semua Status</option>
                <option value="pending" {{ $currentStatus === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $currentStatus === 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ $currentStatus === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $currentStatus === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">ID Order</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Pelanggan</th>
                    <th class="text-right px-6 py-4 text-sm font-semibold text-gray-700">Total</th>
                    <th class="text-center px-6 py-4 text-sm font-semibold text-gray-700">Status</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Tanggal</th>
                    <th class="text-center px-6 py-4 text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <span class="font-semibold text-gray-900">#{{ $order->order_id }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-900">{{ $order->user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $order->user->email }}</p>
                    </td>
                    <td class="px-6 py-4 text-right font-bold text-amber-700">{{ $order->formatted_total }}</td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" 
                                    class="px-3 py-1 rounded-full text-sm font-semibold border-0
                                        @if($order->status === 'pending') bg-yellow-100 text-yellow-700
                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                                        @elseif($order->status === 'completed') bg-green-100 text-green-700
                                        @else bg-red-100 text-red-700
                                        @endif">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-amber-600 hover:text-amber-700 font-semibold">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        Belum ada pesanan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</x-admin-layout>
