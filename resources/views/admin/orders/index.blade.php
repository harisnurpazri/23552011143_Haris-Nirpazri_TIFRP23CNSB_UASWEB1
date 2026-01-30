<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Riwayat Penjualan</h1>
        <div class="flex items-center gap-2">
            <input type="hidden" id="export-format" value="csv">

            <a id="export-orders-btn" data-export-base="{{ route('admin.orders.export') }}" href="{{ route('admin.orders.export', request()->only('status','date_from','date_to')) }}" 
               class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 text-sm font-semibold">
                Export
            </a>
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-xl p-4 shadow-sm mb-6">
        <form id="orders-filter-form" action="{{ route('admin.orders.index') }}" method="GET" class="flex flex-wrap gap-4 items-center">
                <label class="text-gray-700 font-medium">Filter Status:</label>
            <select name="status" data-auto-submit class="px-4 py-2 border rounded-lg">
                <option value="">Semua Status</option>
                <option value="pending" {{ $currentStatus === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $currentStatus === 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ $currentStatus === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $currentStatus === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <label class="text-gray-700 font-medium">Dari:</label>
            <input type="date" name="date_from" value="{{ request('date_from') }}" class="px-3 py-2 border rounded-lg" />

            <label class="text-gray-700 font-medium">Sampai:</label>
            <input type="date" name="date_to" value="{{ request('date_to') }}" class="px-3 py-2 border rounded-lg" />

            {{-- Export format selector above (CSV/XLSX). The server will decide actual output if XLSX is available. --}}

            <div class="ms-auto flex items-center gap-2">
                <button type="submit" class="px-4 py-2 bg-amber-100 text-amber-800 rounded-lg">Terapkan Filter</button>
            </div>
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
                        @php $s = $order->status; @endphp
                        <span class="px-3 py-1 rounded-full text-sm font-semibold border-0
                            @if($s === 'pending') bg-yellow-100 text-yellow-700
                            @elseif($s === 'processing') bg-blue-100 text-blue-700
                            @elseif($s === 'completed') bg-green-100 text-green-700
                            @else bg-red-100 text-red-700
                            @endif">
                            {{ ucfirst($s) }}
                        </span>
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

@push('scripts')
<script nonce="{{ $cspNonce ?? '' }}">
    (function(){
        const btn = document.getElementById('export-orders-btn');
        const select = document.getElementById('export-format');
        if (!btn || !select) return;

        // Build current filter query from inputs in the form
        function getCurrentFilters() {
            const params = new URLSearchParams();
            const status = document.querySelector('select[name="status"]')?.value || '';
            const dateFrom = document.querySelector('input[name="date_from"]')?.value || '';
            const dateTo = document.querySelector('input[name="date_to"]')?.value || '';
            if (status) params.set('status', status);
            if (dateFrom) params.set('date_from', dateFrom);
            if (dateTo) params.set('date_to', dateTo);
            return params;
        }

        function updateExportHref() {
            const base = btn.dataset.exportBase || btn.getAttribute('href');
            const params = getCurrentFilters();
            // Export format fixed to CSV (no XLSX dependency)
            const fmt = 'csv';
            params.set('format', fmt);
            btn.setAttribute('href', base + (params.toString() ? ('?' + params.toString()) : ''));
        }

        // Update on load
        updateExportHref();

        // No format selector; export always CSV

        // Also update when filter inputs change
        ['change','input'].forEach(evt => {
            document.getElementById('orders-filter-form')?.addEventListener(evt, updateExportHref);
        });
    })();
</script>
@endpush
