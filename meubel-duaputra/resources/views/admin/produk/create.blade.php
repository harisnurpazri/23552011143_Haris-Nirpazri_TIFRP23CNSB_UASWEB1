<x-admin-layout>
    <div class="max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Tambah Produk Baru</h1>

        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl p-6 shadow-sm">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" required
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    @error('nama_produk') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', 0) }}" required min="0"
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        @error('harga') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', 0) }}" required min="0"
                               class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        @error('stok') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Kategori</label>
                    <input type="text" name="kategori" value="{{ old('kategori') }}" required list="kategori-list"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                           placeholder="Pilih atau ketik kategori baru">
                    <datalist id="kategori-list">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">
                        @endforeach
                    </datalist>
                    @error('kategori') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Gambar Produk</label>
                    <input type="file" name="gambar" accept="image/*"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    @error('gambar') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" class="px-6 py-3 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
                    Simpan Produk
                </button>
                <a href="{{ route('admin.produk.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
