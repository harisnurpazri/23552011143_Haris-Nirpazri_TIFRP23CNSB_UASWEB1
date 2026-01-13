<x-admin-layout>
    <div class="flex flex-col h-[calc(100vh-8rem)]">
        <!-- Header -->
        <div class="bg-white border-b px-6 py-4 flex items-center justify-between shadow-sm rounded-t-xl">
            <div class="flex items-center">
                <a href="{{ route('admin.chat.index') }}" class="mr-4 text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <!-- Messages Area -->
        <div id="messages-container" class="flex-1 overflow-y-auto bg-gray-50 p-6 space-y-4">
            @foreach($messages as $msg)
                <div class="flex {{ $msg->sender_role === 'admin' ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[70%]">
                        <div class="rounded-2xl px-5 py-3 shadow-sm text-sm 
                            {{ $msg->sender_role === 'admin' 
                                ? 'bg-amber-600 text-white rounded-br-none' 
                                : 'bg-white text-gray-800 border border-gray-200 rounded-bl-none' }}">
                            <p>{{ $msg->message }}</p>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-1 {{ $msg->sender_role === 'admin' ? 'text-right' : 'text-left' }}">
                            {{ $msg->created_at->format('H:i') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Input Area -->
        <div class="bg-white border-t p-4 rounded-b-xl">
            <form action="{{ route('admin.chat.reply', $user->id) }}" method="POST" class="flex gap-4">
                @csrf
                <input type="text" name="message" required placeholder="Ketik balasan..." 
                       class="flex-1 border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                <button type="submit" class="px-6 py-2 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition flex items-center">
                    <span>Kirim</span>
                    <svg class="ml-2 w-4 h-4 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <script>
        // Auto scroll to bottom
        const container = document.getElementById('messages-container');
        container.scrollTop = container.scrollHeight;
    </script>
</x-admin-layout>
