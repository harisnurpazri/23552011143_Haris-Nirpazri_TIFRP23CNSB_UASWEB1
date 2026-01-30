<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Kelola Produk</h1>
        <a href="{{ route('admin.produk.create') }}" class="px-4 py-2 bg-amber-600 text-white font-semibold rounded-lg hover:bg-amber-700 transition">
            + Tambah Produk
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Produk</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Kategori</th>
                    <th class="text-right px-6 py-4 text-sm font-semibold text-gray-700">Harga</th>
                    <th class="text-center px-6 py-4 text-sm font-semibold text-gray-700">Stok</th>
                    <th class="text-center px-6 py-4 text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg overflow-hidden mr-4">
                                @if($product->gambar && file_exists(public_path('assets/img/' . $product->gambar)))
                                    <img src="{{ asset('assets/img/' . $product->gambar) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $product->nama_produk }}</p>
                                <p class="text-sm text-gray-500 line-clamp-1">{{ Str::limit($product->deskripsi, 50) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-amber-100 text-amber-700 text-sm rounded-full">{{ $product->kategori }}</span>
                    </td>
                    <td class="px-6 py-4 text-right font-semibold text-gray-900">{{ $product->formatted_harga }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($product->stok > 10)
                            <span class="text-green-600 font-semibold">{{ $product->stok }}</span>
                        @elseif($product->stok > 0)
                            <span class="text-yellow-600 font-semibold">{{ $product->stok }}</span>
                        @else
                            <span class="text-red-600 font-semibold">0</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.produk.edit', $product->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.produk.destroy', $product->id) }}" method="POST" data-confirm="Hapus produk ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        Belum ada produk. <a href="{{ route('admin.produk.create') }}" class="text-amber-600 hover:underline">Tambah produk pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</x-admin-layout>
