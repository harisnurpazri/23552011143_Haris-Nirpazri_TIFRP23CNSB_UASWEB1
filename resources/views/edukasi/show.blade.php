<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('edukasi.index') }}" class="inline-flex items-center text-amber-600 hover:text-amber-700 font-semibold">
                    ← Kembali ke Daftar Edukasi
                </a>
            </div>

            <article class="bg-white rounded-2xl shadow-sm overflow-hidden">
                @if($edukasi->gambar && file_exists(public_path('assets/img/' . $edukasi->gambar)))
                    <div class="h-64 sm:h-96 w-full relative">
                        <img src="{{ asset('assets/img/' . $edukasi->gambar) }}" 
                             alt="{{ $edukasi->judul }}"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-8">
                            <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">{{ $edukasi->judul }}</h1>
                            <p class="text-white/80">{{ $edukasi->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @else
                    <div class="p-8 border-b bg-amber-50">
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">{{ $edukasi->judul }}</h1>
                        <p class="text-gray-500">{{ $edukasi->created_at->format('d F Y') }}</p>
                    </div>
                @endif

                <div class="p-8 sm:p-12">
                    <div class="prose prose-lg prose-amber max-w-none text-gray-700">
                        {!! nl2br(e($edukasi->konten)) !!}
                    </div>
                </div>
            </article>

            <div class="mt-12 text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Tertarik dengan produk kami?</h3>
                <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-4 bg-amber-600 text-white font-bold rounded-xl hover:bg-amber-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Lihat Katalog Produk
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
