<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex items-center justify-center py-12 px-4 relative overflow-hidden" style="background: linear-gradient(135deg, rgba(31, 41, 55, 0.8), rgba(75, 85, 99, 0.7)), url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center center/cover no-repeat;">
            <!-- Floating particles for decoration -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-amber-400 rounded-full opacity-60 animate-pulse"></div>
                <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-amber-300 rounded-full opacity-40 animate-bounce" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-1/4 left-1/3 w-3 h-3 bg-amber-500 rounded-full opacity-30 animate-pulse" style="animation-delay: 1s;"></div>
                <div class="absolute top-2/3 right-1/4 w-1 h-1 bg-amber-200 rounded-full opacity-50 animate-bounce" style="animation-delay: 3s;"></div>
            </div>

            <div class="w-full px-4">
                <div class="w-full max-w-3xl mx-auto bg-white/98 rounded-2xl shadow-2xl border border-white/20 backdrop-blur-md overflow-hidden transform transition-all duration-500 hover:scale-105">
                    <div class="h-3 bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 opacity-90"></div>
                    <div class="p-4 md:p-6 bg-gradient-to-br from-white/95 to-amber-50/30">
                        <!-- Brand text removed as requested -->
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
