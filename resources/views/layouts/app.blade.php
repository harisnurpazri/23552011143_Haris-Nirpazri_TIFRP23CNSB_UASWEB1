<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Meubel Dua Putra') }}</title>

        <!-- Favicon / App icons (use project logo) -->
        <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>[x-cloak]{display:none!important;}</style>
    </head>
    <body class="font-sans antialiased">
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
            
            <!-- Shared Footer -->
            @include('components.footer')
        </div>

        <!-- Chat Widget -->
        @auth
        @if(auth()->user()->role === 'user')
        <div x-data="chatWidget" x-init="initChat()" class="fixed bottom-6 right-6 z-60">
            <!-- Chat Button -->
            <button @click="toggleChat()" 
                    class="bg-amber-600 hover:bg-amber-700 text-white rounded-full p-4 shadow-lg transition transform hover:scale-105 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
            </button>

                <!-- Chat Window -->
            <div x-show="isOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                 class="absolute bottom-20 right-0 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 hidden">
                
                <!-- Header -->
                <div class="bg-amber-600 p-4 flex justify-between items-center text-white">
                    <h3 class="font-bold">Live Chat Admin</h3>
                    <button @click="toggleChat()" class="hover:text-gray-200 focus:outline-none">
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
            document.addEventListener('alpine:init', () => {
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
                        this.isOpen = !this.isOpen;
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
            });
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

                        var openModalEl = closestWithAttr(target, 'data-open-modal');
                        if (openModalEl) {
                            e.preventDefault();
                            var id = openModalEl.getAttribute('data-open-modal');
                            var node = document.getElementById(id);
                            if (node) {
                                node.classList.remove('hidden'); node.classList.add('flex'); document.body.style.overflow='hidden';
                            }
                            return;
                        }

                        var closeModalEl = closestWithAttr(target, 'data-close-modal');
                        if (closeModalEl) {
                            e.preventDefault();
                            var id = closeModalEl.getAttribute('data-close-modal');
                            var node = document.getElementById(id);
                            if (node) {
                                node.classList.add('hidden'); node.classList.remove('flex'); document.body.style.overflow='auto';
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
                    document.querySelectorAll('select[data-auto-submit]').forEach(function(sel){
                        sel.addEventListener('change', function(){
                            var form = sel.closest('form'); if (form) form.submit();
                        });
                    });
                })();
            </script>
    </body>
</html>
