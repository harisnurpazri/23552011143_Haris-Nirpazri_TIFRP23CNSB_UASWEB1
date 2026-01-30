<x-app-layout>
    <x-slot name="title">{{ $edukasi->judul }} - Edukasi Furniture</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50">
        <!-- Progress Bar -->
        <div class="fixed top-0 left-0 w-full h-1 bg-amber-100 z-50">
            <div id="readingProgress" class="h-full bg-gradient-to-r from-amber-500 to-orange-500 transition-all duration-300"></div>
        </div>

        <!-- Floating Back Button (Desktop) -->
        <div class="fixed top-24 left-6 z-40 hidden lg:block">
            <a href="{{ route('edukasi.index') }}"
               class="inline-flex items-center gap-2 bg-white/90 backdrop-blur-sm text-amber-700 px-4 py-2 rounded-full shadow-lg hover:shadow-xl border border-amber-200 hover:bg-amber-50 transition-all transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Hero Section -->
        <section class="relative">
            <!-- Featured Image atau Gradient Background -->
            @if($edukasi->gambar && file_exists(public_path('assets/img/' . $edukasi->gambar)))
                <div class="h-[60vh] bg-cover bg-center relative" style="background-image: url('{{ asset('assets/img/' . $edukasi->gambar) }}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                </div>
            @else
                <div class="h-[60vh] bg-gradient-to-br from-amber-600 via-orange-500 to-amber-700"></div>
            @endif

            <!-- Title Overlay -->
            <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">
                <div class="max-w-4xl mx-auto">
                    <div class="mb-6 lg:hidden">
                        <a href="{{ route('edukasi.index') }}"
                           class="inline-flex items-center gap-2 text-white/90 hover:text-white font-medium text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali ke Edukasi
                        </a>
                    </div>
                    <h1 class="text-3xl lg:text-5xl font-bold text-white mb-4 leading-tight">
                        {{ $edukasi->judul }}
                    </h1>
                    <div class="flex items-center gap-4 text-white/90">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ max(1, ceil(str_word_count(strip_tags($edukasi->konten)) / 200)) }} menit baca</span>
                        </div>
                        <div class="w-1 h-1 bg-white/60 rounded-full"></div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Tips Expert</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-12 lg:py-16">
            <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <!-- Main Article -->
                <article class="bg-white rounded-2xl shadow-xl overflow-hidden border border-amber-100">
                    <div class="p-8 lg:p-12">
                        <!-- Article Content -->
                        <div class="prose prose-lg prose-amber max-w-none" id="articleContent">
                            <div class="text-gray-800 leading-relaxed space-y-6">
                                {!! nl2br(e($edukasi->konten)) !!}
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="mt-8 pt-6 border-t border-amber-100">
                            <div class="flex flex-wrap items-center gap-4">
                                <span class="font-medium text-gray-700">Tags:</span>
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-medium">Furniture</span>
                                    <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">Edukasi</span>
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">Tips</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- CTA Section -->
                <div class="mt-12 text-center">
                    <div class="bg-white rounded-2xl shadow-xl border border-amber-100 p-8 lg:p-10">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Tertarik dengan Produk Furniture Kami?</h3>
                        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                            Jelajahi koleksi furniture premium kami dan temukan piece yang sempurna untuk rumah impian Anda. Dari kayu berkualitas tinggi hingga desain modern.
                        </p>
                        <a href="{{ route('home') }}"
                           class="inline-flex items-center gap-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Lihat Katalog Produk
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script nonce="{{ $cspNonce ?? '' }}">
        document.addEventListener('DOMContentLoaded', function() {
            // Reading progress bar
            function updateProgress() {
                const article = document.getElementById('articleContent');
                const progressBar = document.getElementById('readingProgress');

                if (article && progressBar) {
                    const articleTop = article.offsetTop;
                    const articleHeight = article.scrollHeight;
                    const windowHeight = window.innerHeight;
                    const scrolled = window.scrollY - articleTop + windowHeight / 2;
                    const progress = Math.max(0, Math.min(100, (scrolled / articleHeight) * 100));
                    progressBar.style.width = progress + '%';
                }
            }

            // Update progress on scroll
            window.addEventListener('scroll', updateProgress);
            updateProgress(); // Initial call

            // Share functions
            window.shareToWhatsApp = function() {
                const url = window.location.href;
                const title = '{{ $edukasi->judul }}';
                const text = `${title}\n\nBaca artikel menarik ini di:\n${url}`;
                const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(text)}`;
                window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
            };

            window.copyToClipboard = function() {
                navigator.clipboard.writeText(window.location.href).then(function() {
                    showToast('Link berhasil disalin!', 'success');
                }).catch(function() {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea');
                    textArea.value = window.location.href;
                    textArea.style.position = 'fixed';
                    textArea.style.left = '-999999px';
                    textArea.style.top = '-999999px';
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                    showToast('Link berhasil disalin!', 'success');
                });
            };

            // Toast notification
            function showToast(message, type = 'info') {
                // Remove existing toasts
                const existingToasts = document.querySelectorAll('.toast-notification');
                existingToasts.forEach(toast => toast.remove());

                const toast = document.createElement('div');
                toast.className = `toast-notification fixed top-6 right-6 px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-all duration-300 ${
                    type === 'success' ? 'bg-green-500 text-white' : 'bg-blue-500 text-white'
                }`;
                toast.innerHTML = `
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium">${message}</span>
                    </div>
                `;

                document.body.appendChild(toast);

                // Show toast
                requestAnimationFrame(() => {
                    toast.classList.remove('translate-x-full');
                });

                // Hide toast after 4 seconds
                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    setTimeout(() => {
                        toast.remove();
                    }, 300);
                }, 4000);
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</x-app-layout>
