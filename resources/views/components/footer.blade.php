<footer class="bg-gray-900 text-gray-300 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Meubel Dua Putra') }}" class="h-12 w-12 rounded-lg object-cover shadow" />
                    <div>
                        <h3 class="text-xl font-bold text-white mb-0">Meubel Dua Putra</h3>
                        <p class="text-gray-400 text-sm mt-1">Furniture berkualitas tinggi dengan kayu pilihan untuk hunian Anda.</p>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4">Menu</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('edukasi.index') }}" class="hover:text-white transition">Edukasi</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-white transition">Login</a></li>
                    @endauth
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4">Kontak</h4>
                <ul class="space-y-2 text-gray-400">
                    <li>📍 Pangandaran, Jawa Barat</li>
                    <li>📞 +62 812-3456-7890</li>
                    <li>✉️ info@meubelduaputra.com</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} 23552011143_Haris Nurpazri_TIFRP23CNSB_UASWEB1</p>
        </div>
    </div>
</footer>
