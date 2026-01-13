<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome -->
            <div class="bg-white rounded-2xl p-8 shadow-sm mb-8">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mr-6">
                        <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Selamat Datang, {{ $user->name }}! 👋</h2>
                        <p class="text-gray-600">Jelajahi koleksi furniture berkualitas kami</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Edukasi Kayu</h3>
                    <p class="text-gray-600 mb-4">Pelajari tentang jenis dan kualitas kayu untuk furniture Anda</p>
                    <a href="{{ route('edukasi.index') }}" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700">
                        Lihat Edukasi →
                    </a>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Belanja Sekarang</h3>
                    <p class="text-gray-600 mb-4">Temukan furniture impian Anda dari koleksi terbaik kami</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700">
                        Lihat Katalog →
                    </a>
                </div>
            </div>

            <!-- Features -->
            <div class="grid md:grid-cols-3 gap-4 mb-8">
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-4 text-center">
                    <svg class="w-8 h-8 mx-auto mb-2 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                    </svg>
                    <h4 class="font-bold text-gray-900">Gratis Ongkir</h4>
                    <p class="text-sm text-gray-600">Area Pangandaran</p>
                </div>
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-4 text-center">
                    <svg class="w-8 h-8 mx-auto mb-2 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <h4 class="font-bold text-gray-900">Garansi 1 Tahun</h4>
                    <p class="text-sm text-gray-600">Semua Produk</p>
                </div>
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-4 text-center">
                    <svg class="w-8 h-8 mx-auto mb-2 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <h4 class="font-bold text-gray-900">Support 24/7</h4>
                    <p class="text-sm text-gray-600">Fast Response</p>
                </div>
            </div>

            <!-- Recent Orders -->
            @if($recentOrders->isNotEmpty())
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="p-6 border-b">
                    <h3 class="font-bold text-gray-900">Pesanan Terbaru</h3>
                </div>
                <div class="divide-y">
                    @foreach($recentOrders as $order)
                    <div class="p-4 flex items-center justify-between">
                        <div>
                            <span class="font-semibold text-gray-900">#{{ $order->order_id }}</span>
                            <span class="text-gray-500 text-sm ml-2">{{ $order->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-bold text-amber-700">{{ $order->formatted_total }}</span>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                @if($order->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                                @elseif($order->status === 'completed') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                            <a href="{{ route('invoice.show', $order->id) }}" class="text-amber-600 hover:text-amber-700">
                                Lihat →
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
