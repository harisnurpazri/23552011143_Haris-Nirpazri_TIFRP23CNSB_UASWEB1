<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if(session('login_lockout_seconds'))
        <div id="login-lockout" class="mb-4 rounded-md bg-red-50 border border-red-200 p-3 text-sm text-red-800">
            Terlalu banyak percobaan login. Coba lagi dalam <span id="lockout-seconds">{{ session('login_lockout_seconds') }}</span> detik.
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

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
</x-guest-layout>
