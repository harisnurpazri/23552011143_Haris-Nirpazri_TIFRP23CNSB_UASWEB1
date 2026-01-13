<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="w-20 h-20 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Edukasi: Kualitas Kayu</h1>
                <p class="text-gray-600">Pelajari tentang berbagai jenis kayu dan kualitasnya untuk furniture Anda</p>
            </div>

            @if($edukasiList->isEmpty())
                <div class="bg-white rounded-2xl p-12 text-center shadow-sm">
                    <div class="text-6xl mb-4">📚</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Konten Edukasi</h3>
                    <p class="text-gray-600">Konten edukasi akan segera ditambahkan</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($edukasiList as $edu)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition group">
                        <div class="h-48 bg-gray-100 overflow-hidden">
                            @if($edu->gambar && file_exists(public_path('assets/img/' . $edu->gambar)))
                                <img src="{{ asset('assets/img/' . $edu->gambar) }}" 
                                     alt="{{ $edu->judul }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $edu->judul }}</h3>
                            <p class="text-gray-600 line-clamp-3 mb-4">{{ $edu->konten }}</p>
                            <button data-open-modal="modal-{{ $edu->id }}" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="modal-{{ $edu->id }}" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
                        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                            <div class="bg-gradient-to-r from-amber-700 to-amber-600 text-white p-6 flex justify-between items-center">
                                <h3 class="text-xl font-bold">{{ $edu->judul }}</h3>
                                <button data-close-modal="modal-{{ $edu->id }}" class="text-white/80 hover:text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6">
                                @if($edu->gambar && file_exists(public_path('assets/img/' . $edu->gambar)))
                                    <img src="{{ asset('assets/img/' . $edu->gambar) }}" 
                                         alt="{{ $edu->judul }}"
                                         class="w-full h-64 object-cover rounded-xl mb-6">
                                @endif
                                <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $edu->konten }}</div>
                                <div class="mt-6 pt-4 border-t text-sm text-gray-500">
                                    Dipublikasikan: {{ $edu->created_at->format('d F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:border-gray-400 transition">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <script nonce="{{ $cspNonce ?? '' }}">
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.getElementById(id).classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.getElementById(id).classList.remove('flex');
            document.body.style.overflow = 'auto';
        }
    </script>
</x-app-layout>
