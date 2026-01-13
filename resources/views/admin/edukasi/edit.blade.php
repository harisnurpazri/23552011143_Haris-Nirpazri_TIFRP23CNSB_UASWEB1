<x-admin-layout>
    <div class="max-w-3xl">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Artikel Edukasi</h1>

        <form action="{{ route('admin.edukasi.update', $edukasi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl p-6 shadow-sm">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Judul Artikel</label>
                    <input type="text" name="judul" value="{{ old('judul', $edukasi->judul) }}" required
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    @error('judul') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Konten</label>
                    <textarea name="konten" rows="10" required
                              class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('konten', $edukasi->konten) }}</textarea>
                    @error('konten') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Gambar Banner</label>
                    @if($edukasi->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('assets/img/' . $edukasi->gambar) }}" class="w-48 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-500 mt-1">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="gambar" accept="image/*"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
                    @error('gambar') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" class="px-6 py-3 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.edukasi.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
