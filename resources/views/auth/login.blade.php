<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full max-w-4xl mx-auto login-container">
        <div class="glass rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row relative transform transition-all duration-500 hover:shadow-3xl group mx-auto border border-white/20 glow-effect">
            <!-- Animated gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-amber-400/10 via-transparent to-amber-600/10 opacity-50"></div>

            <!-- decorative corner ornament -->
            <div class="hidden md:block absolute -left-6 -top-6 w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-700 rounded-xl rotate-12 shadow-lg"></div>
            <div class="hidden md:block absolute -right-6 -bottom-6 w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-700 rounded-xl -rotate-12 shadow-lg"></div>
            <!-- Left brand panel (professional split layout) -->
            <div class="md:w-1/2 bg-gradient-to-br from-amber-600 via-amber-700 to-amber-800 text-white p-8 hidden md:flex items-center justify-center relative overflow-hidden">
                <!-- Decorative circles -->
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-white/10 rounded-full"></div>
                <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-white/10 rounded-full"></div>

                <div class="text-center w-full relative z-10">
                    <div class="mx-auto w-32 h-32 rounded-full bg-white/15 backdrop-blur-sm flex items-center justify-center mb-6 overflow-hidden shadow-xl border border-white/20 transition-transform duration-300 hover:scale-110">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Meubel Dua Putra') }}" class="w-18 h-18 object-contain" />
                    </div>

                    <h3 class="text-2xl font-bold tracking-wide uppercase text-white mb-3 drop-shadow-lg">LOGIN</h3>
                    <p class="text-base text-white/95 leading-relaxed font-medium">Masuk untuk mengelola pesanan dan profil Anda dengan cepat.</p>

                    <!-- Decorative line -->
                    <div class="w-16 h-1 bg-white/60 rounded-full mx-auto mt-4"></div>
                </div>
            </div>

            <!-- Right form panel -->
            <div class="w-full md:w-1/2 p-6 md:p-10 bg-white/95 backdrop-blur-sm relative">
                <!-- Subtle pattern overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-amber-50/50 to-white/80"></div>

                <div class="mb-6 relative z-10">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Masuk ke Akun Anda</h2>
                    <p class="mt-2 text-base text-gray-600">Gunakan email dan password Anda untuk mengakses akun.</p>
                </div>
                <div class="h-1.5 w-24 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full mb-6 relative z-10"></div>

                @if(session('login_lockout_seconds'))
                    <div id="login-lockout" class="mb-4 rounded-md bg-red-50 border border-red-200 p-3 text-sm text-red-800">
                        Terlalu banyak percobaan login. Coba lagi dalam <span id="lockout-seconds">{{ session('login_lockout_seconds') }}</span> detik.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6 relative z-10" novalidate>
                    @csrf

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                        <div class="relative">
                            <x-text-input id="email" class="input-modern w-full pl-4 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-amber-500 focus:ring-0 focus:ring-4 focus:ring-amber-100 transition-all duration-200 bg-white/80 backdrop-blur-sm shadow-sm h-12" type="email" name="email" :value="old('email')" placeholder="nama@email.com" required autofocus autocomplete="username" aria-describedby="email-error" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" id="email-error" />
                    </div>

                    <!-- Password with toggle -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative">
                            <x-text-input id="password" class="input-modern w-full pl-4 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-amber-500 focus:ring-0 focus:ring-4 focus:ring-amber-100 transition-all duration-200 bg-white/80 backdrop-blur-sm shadow-sm h-12" type="password" name="password" placeholder="Masukkan password" required autocomplete="current-password" aria-describedby="password-error" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" id="password-error" />
                    </div>

                    <div class="pt-2">
                        <x-primary-button class="btn-modern w-full py-4 text-base font-semibold text-white rounded-xl border-0 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-amber-200">{{ __('Masuk') }}</x-primary-button>
                    </div>

                    <!-- social login removed as requested -->
                </form>
            </div>
        </div>
    </div>

    @if(session('login_lockout_seconds'))
    <script nonce="{{ $cspNonce ?? '' }}">
        (function(){
            var seconds = parseInt(@json(session('login_lockout_seconds')) || 0, 10);
            var display = document.getElementById('lockout-seconds');
            var submitBtn = document.querySelector('form button[type="submit"], form x-primary-button');

            if (!display) return;

            function disableLogin() {
                if (submitBtn) submitBtn.setAttribute('disabled', 'disabled');
            }
            function enableLogin() {
                if (submitBtn) submitBtn.removeAttribute('disabled');
            }

            disableLogin();

            var interval = setInterval(function(){
                seconds = seconds - 1;
                if (seconds <= 0) {
                    clearInterval(interval);
                    display.textContent = '0';
                    enableLogin();
                    // Optionally remove the lockout box
                    var box = document.getElementById('login-lockout'); if (box) box.style.display = 'none';
                    return;
                }
                display.textContent = seconds;
            }, 1000);
        })();
    </script>
    @endif

    <!-- password toggle script removed (no toggle UI present) -->
</x-guest-layout>
