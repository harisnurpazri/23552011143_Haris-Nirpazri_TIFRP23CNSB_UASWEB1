<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur-lg sticky top-0 z-50 shadow-2xl border-b border-white/20 transition-all duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Left Side: Logo Only -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group relative transform hover:scale-105 transition-all duration-300">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-amber-600 rounded-xl blur-lg opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <img src="{{ asset('images/logo.png') }}" class="relative h-12 w-12 rounded-xl shadow-lg object-cover group-hover:scale-105 transition-all duration-300 ring-2 ring-white/50" alt="{{ config('app.name', 'Meubel Dua Putra') }}">
                    </div>
                    <div class="hidden lg:block">
                        <span class="font-black text-xl bg-gradient-to-r from-amber-600 to-amber-800 bg-clip-text text-transparent tracking-tight">
                            Meubel Dua Putra
                        </span>
                        <div class="text-xs text-gray-500 font-medium -mt-1">Premium Furniture</div>
                    </div>
                </a>
            </div>

            <!-- Right Side: All Navigation & User Elements -->
            <div class="flex items-center gap-3">
                <!-- Unified Button Container -->
                <div class="flex items-center gap-3 p-2 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                    <!-- Navigation Links -->
                    @auth
                        <a href="{{ route('dashboard') }}" class="relative px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-400 hover:via-amber-500 hover:to-amber-600 rounded-xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-1 shadow-2xl hover:shadow-3xl shadow-amber-500/50 hover:shadow-amber-400/60 ring-2 ring-amber-300/50 hover:ring-amber-200/60 group overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                            <span class="relative z-10 drop-shadow-lg">Beranda</span>
                        </a>
                    @endauth
                    <a href="{{ route('home') }}" class="relative px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-400 hover:via-amber-500 hover:to-amber-600 rounded-xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-1 shadow-2xl hover:shadow-3xl shadow-amber-500/50 hover:shadow-amber-400/60 ring-2 ring-amber-300/50 hover:ring-amber-200/60 group overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                        <span class="relative z-10 drop-shadow-lg">Home</span>
                    </a>
                    <a href="{{ route('edukasi.index') }}" class="relative px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-400 hover:via-amber-500 hover:to-amber-600 rounded-xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-1 shadow-2xl hover:shadow-3xl shadow-amber-500/50 hover:shadow-amber-400/60 ring-2 ring-amber-300/50 hover:ring-amber-200/60 group overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                        <span class="relative z-10 drop-shadow-lg">Edukasi</span>
                    </a>

                    @auth
                        <!-- Cart Icon -->
                        <a href="{{ route('cart.index') }}" class="relative p-4 text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-400 hover:via-amber-500 hover:to-amber-600 rounded-xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-1 shadow-2xl hover:shadow-3xl shadow-amber-500/50 hover:shadow-amber-400/60 ring-2 ring-amber-300/50 hover:ring-amber-200/60 group overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                            <svg class="w-5 h-5 relative z-10 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            @php $cartCount = array_sum(session('cart', [])); @endphp
                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-2 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center shadow-lg ring-2 ring-red-300/50 animate-pulse">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>

                        <!-- User Dropdown -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="relative p-4 text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-400 hover:via-amber-500 hover:to-amber-600 rounded-xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-1 shadow-2xl hover:shadow-3xl shadow-amber-500/50 hover:shadow-amber-400/60 ring-2 ring-amber-300/50 hover:ring-amber-200/60 group overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                                    <div class="relative z-10 w-5 h-5 bg-white/50 rounded-lg flex items-center justify-center text-xs font-bold drop-shadow-lg text-amber-800">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @if(Auth::user()->isAdmin())
                                    <x-dropdown-link :href="route('admin.dashboard')">
                                        {{ __('Panel Admin') }}
                                    </x-dropdown-link>
                                @endif

                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profil') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" data-submit-form="true">
                                        {{ __('Keluar') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <!-- Login & Register Buttons -->
                        <a href="{{ route('login') }}" class="relative px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-400 hover:via-amber-500 hover:to-amber-600 rounded-xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-1 shadow-2xl hover:shadow-3xl shadow-amber-500/50 hover:shadow-amber-400/60 ring-2 ring-amber-300/50 hover:ring-amber-200/60 group overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                            <span class="relative z-10 drop-shadow-lg">Masuk</span>
                        </a>
                        <a href="{{ route('register') }}" class="relative px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 hover:from-amber-400 hover:via-amber-500 hover:to-amber-600 rounded-xl transition-all duration-500 transform hover:scale-110 hover:-translate-y-1 shadow-2xl hover:shadow-3xl shadow-amber-500/50 hover:shadow-amber-400/60 ring-2 ring-amber-300/50 hover:ring-amber-200/60 group overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                            <span class="relative z-10 drop-shadow-lg">Daftar</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
