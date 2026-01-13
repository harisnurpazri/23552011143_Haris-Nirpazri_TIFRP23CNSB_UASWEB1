<x-admin-layout>
    <div class="max-w-3xl">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Tambah Artikel Edukasi</h1>

        <form action="{{ route('admin.edukasi.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl p-6 shadow-sm">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Judul Artikel</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" required
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    @error('judul') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Konten</label>
                    <textarea name="konten" rows="10" required
                              class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('konten') }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Tips: Gunakan enter untuk paragraf baru.</p>
                    @error('konten') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Gambar Banner</label>
                    <input type="file" name="gambar" accept="image/*" required
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Max: 2MB.</p>
                    @error('gambar') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" class="px-6 py-3 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
                    Simpan Artikel
                </button>
                <a href="{{ route('admin.edukasi.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
