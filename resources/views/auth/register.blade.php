<x-guest-layout>

    <div class="w-full max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col md:flex-row relative transform transition-all duration-300 md:hover:-translate-y-1 md:hover:shadow-2xl group mx-auto">
            <!-- decorative corner ornament -->
            <div class="hidden md:block absolute -left-6 -top-6 w-12 h-12 bg-amber-600 rounded-md rotate-12"></div>
            <div class="hidden md:block absolute -right-6 -bottom-6 w-12 h-12 bg-amber-600 rounded-md -rotate-12"></div>

            <!-- Left brand panel -->
            <div class="md:w-1/2 bg-amber-700 text-white p-8 hidden md:flex items-center justify-center">
                <div class="text-center w-full">
                    <div class="mx-auto w-28 h-28 rounded-full bg-white/10 flex items-center justify-center mb-4 overflow-hidden">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Meubel Dua Putra') }}" class="w-16 h-16 object-contain" />
                    </div>

                    <h3 class="text-lg font-semibold tracking-wide uppercase text-white/95 mb-2">Welcome</h3>
                    <p class="text-sm text-white/90">Bergabunglah dan dapatkan pengalaman belanja yang lebih baik.</p>
                </div>
            </div>

            <!-- Right form panel -->
            <div class="w-full md:w-1/2 p-4 md:p-8 bg-white">
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold text-amber-700">Create account</h2>
                    <p class="mt-1 text-sm text-gray-500">Isi informasi untuk membuat akun baru.</p>
                </div>
                <div class="h-1 w-20 bg-amber-600 rounded-md mb-4"></div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4" novalidate>
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <div class="relative mt-1">
                            <x-text-input id="name" class="pl-3 rounded-md border border-gray-300 focus:border-amber-600 focus:ring-0 focus:ring-2 focus:ring-amber-200 transition-colors duration-150 h-11" type="text" name="name" :value="old('name')" placeholder="Nama lengkap" required autofocus autocomplete="name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative mt-1">
                            <x-text-input id="email" class="pl-3 rounded-md border border-gray-300 focus:border-amber-600 focus:ring-0 focus:ring-2 focus:ring-amber-200 transition-colors duration-150 h-11" type="email" name="email" :value="old('email')" placeholder="nama@email.com" required autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative mt-1">
                            <x-text-input id="password" class="pl-3 pr-3 rounded-md border border-gray-300 focus:border-amber-600 focus:ring-0 focus:ring-2 focus:ring-amber-200 transition-colors duration-150 h-11" type="password" name="password" placeholder="Buat password" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <x-text-input id="password_confirmation" class="mt-1 rounded-md border border-gray-300 h-11" type="password" name="password_confirmation" placeholder="Konfirmasi password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm" />
                    </div>

                    <div>
                        <x-primary-button class="w-full py-3 text-sm bg-amber-600 hover:bg-amber-700 text-white rounded-md shadow-md border border-amber-600 transition transform hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-300">{{ __('Register') }}</x-primary-button>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <a class="text-amber-600 hover:underline" href="{{ route('login') }}">Sudah punya akun? Masuk</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
