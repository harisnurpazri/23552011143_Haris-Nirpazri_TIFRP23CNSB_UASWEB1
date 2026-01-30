<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="cart-count-url" content="{{ route('cart.count') }}">

        <title>{{ config('app.name', 'Meubel Dua Putra') }}</title>

        <!-- Favicon / App icons (use project logo) -->
        <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style nonce="{{ $cspNonce ?? '' }}">[x-cloak]{display:none!important;}</style>
    </head>
    <body class="font-sans antialiased preload">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Flash Messages -->
            @if(session('success') || session('error') || session('warning') || session('info'))
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-2 rounded">{{ session('error') }}</div>
                    @endif
                    @if(session('warning'))
                        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-2 rounded">{{ session('warning') }}</div>
                    @endif
                    @if(session('info'))
                        <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-2 rounded">{{ session('info') }}</div>
                    @endif
                </div>
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Confirm Modal (custom) -->
            <div id="confirm-modal" x-cloak class="hidden fixed inset-0 z-50 items-center justify-center">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="relative bg-white rounded-lg shadow-lg z-60 max-w-md w-full p-6">
                    <h3 id="confirm-modal-title" class="text-lg font-semibold mb-2">Konfirmasi</h3>
                    <p id="confirm-modal-message" class="text-sm text-gray-700 mb-4">Apakah Anda yakin?</p>
                    <div class="flex justify-end gap-2">
                        <button id="confirm-modal-cancel" class="px-4 py-2 bg-gray-100 text-gray-800 rounded">Batal</button>
                        <button id="confirm-modal-ok" class="px-4 py-2 bg-amber-600 text-white rounded">Simpan</button>
                    </div>
                </div>
            </div>

            <!-- Shared Footer -->
            @include('components.footer')
        </div>

        <!-- Chat Widget -->
        @auth
        @if(auth()->user()->role === 'user')
        <div x-data="chatWidget" x-init="initChat()" class="fixed bottom-6 right-6 z-70 pointer-events-auto">
            <!-- Chat Button -->
                    <button @click.stop="toggleChat()"
                    class="bg-amber-600 hover:bg-amber-700 text-white rounded-full p-4 shadow-lg transition transform hover:scale-105 flex items-center justify-center pointer-events-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
            </button>

                <!-- Chat Window -->
                <div x-show="isOpen" x-cloak @click.stop
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                 class="absolute bottom-20 right-0 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">

                <!-- Header -->
                <div class="bg-amber-600 p-4 flex justify-between items-center text-white">
                    <h3 class="font-bold">Live Chat Admin</h3>
                    <button @click.stop="toggleChat()" class="hover:text-gray-200 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Messages Area -->
                <div id="chat-messages" class="h-80 overflow-y-auto p-4 bg-gray-50 flex flex-col space-y-3">
                    <template x-for="msg in messages" :key="msg.id">
                        <div class="flex flex-col" :class="msg.sender_role === 'user' ? 'items-end' : 'items-start'">
                            <div class="max-w-[80%] rounded-2xl px-4 py-2 text-sm shadow-sm"
                                 :class="msg.sender_role === 'user' ? 'bg-amber-600 text-white rounded-br-none' : 'bg-white text-gray-800 border border-gray-200 rounded-bl-none'">
                                <p x-text="msg.message"></p>
                            </div>
                            <span class="text-[10px] text-gray-400 mt-1 px-1" x-text="formatTime(msg.created_at)"></span>
                        </div>
                    </template>
                </div>

                <!-- Input Area -->
                <form @submit.prevent="sendMessage" class="p-3 bg-white border-t flex gap-2">
                    <input type="text" x-model="newMessage" placeholder="Tulis pesan..."
                           class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                    <button type="submit" :disabled="!newMessage.trim()"
                            class="bg-amber-600 text-white rounded-full p-2 hover:bg-amber-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <script nonce="{{ $cspNonce ?? '' }}">
            (function(){
                const registerChatWidget = () => {
                    Alpine.data('chatWidget', () => ({
                        isOpen: false,
                        messages: [],
                        newMessage: '',
                        interval: null,
                        endpoints: {
                            getMessages: '{{ route('chat.getMessages') }}',
                            sendMessage: '{{ route('chat.sendMessage') }}'
                        },

                        initChat() {
                            console.log('Chat widget initialized');
                            this.fetchMessages();
                        },

                        toggleChat() {
                            console.log('toggleChat called, before:', this.isOpen);
                            this.isOpen = !this.isOpen;
                            console.log('toggleChat after:', this.isOpen);
                            if (this.isOpen) {
                                this.fetchMessages();
                                this.scrollToBottom();
                                this.startPolling();
                            } else {
                                this.stopPolling();
                            }
                        },

                        startPolling() {
                            if (!this.interval) {
                                this.interval = setInterval(() => {
                                    this.fetchMessages();
                                }, 3000);
                            }
                        },

                        stopPolling() {
                            if (this.interval) {
                                clearInterval(this.interval);
                                this.interval = null;
                            }
                        },

                        async fetchMessages() {
                            try {
                                const response = await fetch(this.endpoints.getMessages);
                                const data = await response.json();
                                this.messages = data;
                            } catch (error) {
                                console.error('Error fetching messages:', error);
                            }
                        },

                        async sendMessage() {
                            console.log('sendMessage called, message:', this.newMessage);
                            if (!this.newMessage.trim()) return;

                            try {
                                const response = await fetch(this.endpoints.sendMessage, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({ message: this.newMessage })
                                });

                                const data = await response.json();
                                console.log('sendMessage response', data);
                                this.messages.push(data);
                                this.newMessage = '';
                                this.$nextTick(() => this.scrollToBottom());
                            } catch (error) {
                                console.error('Error sending message:', error);
                            }
                        },

                        scrollToBottom() {
                            const container = document.getElementById('chat-messages');
                            if (container) {
                                container.scrollTop = container.scrollHeight;
                            }
                        },

                        formatTime(dateString) {
                            const date = new Date(dateString);
                            return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                        }
                    }));
                };

                if (window.Alpine && typeof window.Alpine.data === 'function') {
                    registerChatWidget();
                } else {
                    document.addEventListener('alpine:init', registerChatWidget);
                }
            })();
        </script>
        @endif
        @endauth
            <script nonce="{{ $cspNonce ?? '' }}">
                (function(){
                    // Delegated handlers for data- attributes to avoid inline event handlers (CSP-safe)

                    // Helper to find closest element with attribute
                    function closestWithAttr(el, attr) {
                        while(el && el !== document) {
                            if (el.hasAttribute && el.hasAttribute(attr)) return el;
                            el = el.parentNode;
                        }
                        return null;
                    }

                    // Click delegation
                    document.addEventListener('click', function(e){
                        var target = e.target;
                        var submitEl = closestWithAttr(target, 'data-submit-form');
                        if (submitEl) {
                            e.preventDefault();
                            var form = submitEl.closest('form');
                            if (form) form.submit();
                            return;
                        }

                        var openChatEl = closestWithAttr(target, 'data-open-chat');
                        if (openChatEl) {
                            e.preventDefault();
                            // If chat widget exists (user logged in and role=user), trigger its toggle
                            var chatHost = document.querySelector('[x-data="chatWidget"]');
                            if (chatHost) {
                                var chatBtn = chatHost.querySelector('button');
                                if (chatBtn) chatBtn.click();
                            } else {
                                // Not logged in or chat not available: redirect to login
                                window.location = '{{ route('login') }}';
                            }
                            return;
                        }

                        var openModalEl = closestWithAttr(target, 'data-open-modal');
                        if (openModalEl) {
                            e.preventDefault();
                            var id = openModalEl.getAttribute('data-open-modal');
                            var node = document.getElementById(id);
                            if (node) {
                                node.classList.remove('hidden'); node.classList.add('flex');
                                document.body.classList.add('overflow-hidden');
                            }
                            return;
                        }

                        var closeModalEl = closestWithAttr(target, 'data-close-modal');
                        if (closeModalEl) {
                            e.preventDefault();
                            var id = closeModalEl.getAttribute('data-close-modal');
                            var node = document.getElementById(id);
                            if (node) {
                                node.classList.add('hidden'); node.classList.remove('flex');
                                document.body.classList.remove('overflow-hidden');
                            }
                            return;
                        }

                        var actionEl = closestWithAttr(target, 'data-action');
                        if (actionEl) {
                            var action = actionEl.getAttribute('data-action');
                            if (action === 'print') { e.preventDefault(); window.print(); }
                            return;
                        }

                        var qtyEl = closestWithAttr(target, 'data-qty-action');
                        if (qtyEl) {
                            e.preventDefault();
                            var form = qtyEl.closest('form');
                            if (!form) return;
                            var input = form.querySelector('input[name="qty"]');
                            if (!input) return;
                            var delta = qtyEl.getAttribute('data-qty-action') === 'decrement' ? -1 : 1;
                            var val = parseInt(input.value || '0', 10) + delta;
                            if (isNaN(val) || val < 1) val = 1;
                            input.value = val;
                        }
                    }, false);

                    // Form submit interception for data-confirm
                    document.addEventListener('submit', function(e){
                        var form = e.target;
                        if (form && form.hasAttribute && form.hasAttribute('data-confirm')) {
                            var msg = form.getAttribute('data-confirm') || 'Are you sure?';
                            if (!confirm(msg)) {
                                e.preventDefault();
                            }
                        }
                    }, true);

                    // Auto-submit selects
                    // Initialize prev-value store for selects so we can revert if user cancels
                    document.querySelectorAll('select[data-auto-submit]').forEach(function(s){
                        try { s.dataset.prev = s.value; } catch(e){}
                    });

                    // Helper: show custom confirm modal, returns Promise<boolean>
                    function showConfirmModal(message) {
                        return new Promise(function(resolve){
                            try {
                                var modal = document.getElementById('confirm-modal');
                                var msg = document.getElementById('confirm-modal-message');
                                var btnOk = document.getElementById('confirm-modal-ok');
                                var btnCancel = document.getElementById('confirm-modal-cancel');
                                if (!modal || !msg || !btnOk || !btnCancel) return resolve(window.confirm(message));

                                msg.textContent = message;
                                modal.classList.remove('hidden');
                                modal.classList.add('flex');

                                function cleanup() {
                                    modal.classList.add('hidden');
                                    modal.classList.remove('flex');
                                    btnOk.removeEventListener('click', onOk);
                                    btnCancel.removeEventListener('click', onCancel);
                                    document.removeEventListener('keydown', onKey);
                                }

                                function onOk(e){ e.preventDefault(); cleanup(); resolve(true); }
                                function onCancel(e){ e.preventDefault(); cleanup(); resolve(false); }
                                function onKey(e){ if (e.key === 'Escape') { cleanup(); resolve(false); } }

                                btnOk.addEventListener('click', onOk);
                                btnCancel.addEventListener('click', onCancel);
                                document.addEventListener('keydown', onKey);
                            } catch (err) {
                                return resolve(window.confirm(message));
                            }
                        });
                    }

                    // Delegated handler: when any <select data-auto-submit> changes, ask for confirm then send AJAX PATCH
                    document.addEventListener('change', async function(e){
                        var target = e.target;
                        if (!target.matches || !target.matches('select[data-auto-submit]')) return;
                        try {
                            console.debug('[auto-submit] select changed', target.name, target.value);
                            var form = target.closest('form');
                            if (!form) return;
                            // previous value (to revert if user cancels)
                            var prev = target.dataset.prev !== undefined ? target.dataset.prev : target.getAttribute('value') || '';

                            // show custom modal and wait for answer
                            var ok = await showConfirmModal('Simpan perubahan status ke "' + target.value + '"?');
                            if (!ok) {
                                // revert selection
                                try { target.value = prev; } catch(e){}
                                return;
                            }
                            var action = form.getAttribute('action');
                            var method = (form.querySelector('input[name="_method"]') || {}).value || form.method || 'POST';
                            // Build payload
                            var data = new FormData();
                            data.append('status', target.value);
                            // include _method if patch
                            if (method && method.toUpperCase() === 'PATCH') data.append('_method', 'PATCH');
                            // CSRF token
                            var tokenMeta = document.querySelector('meta[name="csrf-token"]');
                            var csrf = tokenMeta ? tokenMeta.getAttribute('content') : '';

                            console.debug('[auto-submit] sending AJAX to', action, 'status=', target.value);
                            // show inline spinner and disable select while saving
                            try { target.__saving = true; target.disabled = true; } catch(e){}
                            var spinner = document.createElement('span');
                            spinner.className = 'inline-block w-4 h-4 border-2 border-current border-t-transparent rounded-full ms-2 animate-spin';
                            spinner.setAttribute('aria-hidden','true');
                            target.parentNode && target.parentNode.appendChild(spinner);

                            fetch(action, {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': csrf,
                                    'Accept': 'application/json'
                                },
                                body: data,
                                credentials: 'same-origin'
                            }).then(function(resp){
                                if (!resp.ok) throw resp;
                                return resp.json();
                            }).then(function(json){
                                console.debug('[auto-submit] update response', json);
                                // remove spinner and re-enable select
                                try { if (spinner && spinner.parentNode) spinner.parentNode.removeChild(spinner); } catch(e){}
                                try { target.disabled = false; target.__saving = false; } catch(e){}
                                // update stored prev value so future cancels revert to this saved value
                                try { target.dataset.prev = target.value; } catch(e){}
                                // Optionally update select class styling based on returned status
                                if (json && json.status) {
                                    var s = target;
                                    s.classList.remove('bg-yellow-100','text-yellow-700','bg-blue-100','text-blue-700','bg-green-100','text-green-700','bg-red-100','text-red-700');
                                    if (json.status === 'pending') s.classList.add('bg-yellow-100','text-yellow-700');
                                    else if (json.status === 'processing') s.classList.add('bg-blue-100','text-blue-700');
                                    else if (json.status === 'completed') s.classList.add('bg-green-100','text-green-700');
                                    else s.classList.add('bg-red-100','text-red-700');
                                }
                            }).catch(function(err){
                                console.warn('[auto-submit] update failed', err);
                                // remove spinner and re-enable select
                                try { if (spinner && spinner.parentNode) spinner.parentNode.removeChild(spinner); } catch(e){}
                                try { target.disabled = false; target.__saving = false; } catch(e){}
                            });
                        } catch (e) {
                            console.error('[auto-submit] handler error', e);
                        }
                    }, false);
                })();
            </script>
    </body>
</html>
