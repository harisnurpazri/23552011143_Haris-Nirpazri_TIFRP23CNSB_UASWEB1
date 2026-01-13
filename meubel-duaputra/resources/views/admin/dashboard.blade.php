<x-admin-layout>
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
            <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}</p>
        </div>
        <a href="{{ route('home') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            Lihat Website
        </a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Produk</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $produkCount }}</p>
                    <p class="text-sm text-gray-500">Produk aktif</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Penjualan</p>
                    <p class="text-3xl font-bold text-green-600">{{ $orderCount }}</p>
                    <p class="text-sm text-green-600">+{{ $todayOrders }} hari ini</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Revenue</p>
                    <p class="text-2xl font-bold text-amber-700">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">Dari semua penjualan</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Pelanggan</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $userCount }}</p>
                    <p class="text-sm text-gray-500">User terdaftar</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart & Recent Orders -->
    <div class="grid xl:grid-cols-3 gap-6">
        <!-- Chart -->
        <div class="xl:col-span-2 bg-white rounded-xl p-6 shadow-sm">
            <h3 class="font-bold text-gray-900 mb-4">Grafik Penjualan (7 Hari Terakhir)</h3>
            <canvas id="salesChart" height="100"></canvas>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-gray-900">Pesanan Terbaru</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-amber-600 hover:text-amber-700 text-sm">Lihat Semua →</a>
            </div>
            <div class="space-y-4">
                @forelse($recentOrders as $order)
                <div class="flex justify-between items-center py-3 border-b last:border-0">
                    <div>
                        <p class="font-semibold text-gray-900">#{{ $order->order_id }}</p>
                        <p class="text-sm text-gray-500">{{ $order->user->name }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-amber-700">{{ $order->formatted_total }}</p>
                        <span class="text-xs px-2 py-1 rounded-full
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                            @elseif($order->status === 'completed') bg-green-100 text-green-700
                            @else bg-red-100 text-red-700
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">Belum ada pesanan</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        const chartData = @json($chartData);
        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: chartData.map(d => d.dt),
                datasets: [{
                    label: 'Jumlah Pesanan',
                    data: chartData.map(d => d.cnt),
                    borderColor: '#CD7F32',
                    backgroundColor: 'rgba(205, 127, 50, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true, position: 'top' }
                },
                scales: {
                    y: { beginAtZero: true, ticks: { precision: 0 } }
                }
            }
        });
    </script>
</x-admin-layout>
