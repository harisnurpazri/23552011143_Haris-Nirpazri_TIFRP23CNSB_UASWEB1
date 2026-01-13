<x-admin-layout>
    <div class="max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit User: {{ $user->name }}</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white rounded-xl p-6 shadow-sm">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Role / Peran</label>
                    <select name="role" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User (Pelanggan)</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                    </select>
                    @error('role') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="border-t pt-6 mt-6">
                    <h3 class="font-bold text-gray-900 mb-4">Ubah Password (Opsional)</h3>
                    <p class="text-sm text-gray-500 mb-4">Kosongkan jika tidak ingin mengubah password user ini.</p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">Password Baru</label>
                            <input type="password" name="password"
                                   class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation"
                                   class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" class="px-6 py-3 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
