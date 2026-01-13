<x-admin-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Pesan Masuk</h1>
        <p class="text-gray-500">Daftar percakapan dengan pelanggan.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="divide-y divide-gray-100">
            @forelse($users as $user)
            <a href="{{ route('admin.chat.show', $user->id) }}" class="block hover:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center px-6 py-4">
                    <!-- User Avatar -->
                    <div class="flex-shrink-0 mr-4">
                        <div class="h-12 w-12 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 font-bold text-xl">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </div>
                    
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <h2 class="text-sm font-semibold text-gray-900 truncate">
                                {{ $user->name }}
                                <span class="ml-2 text-xs text-gray-400 font-normal">({{ $user->email }})</span>
                            </h2>
                            <p class="text-xs text-gray-500">
                                @if($user->chatMessages->isNotEmpty())
                                    {{ $user->chatMessages->last()->created_at->diffForHumans() }}
                                @endif
                            </p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600 truncate">
                                @if($user->chatMessages->isNotEmpty())
                                    {{ Str::limit($user->chatMessages->last()->message, 100) }}
                                @else
                                    <span class="text-gray-400 italic">Belum ada pesan</span>
                                @endif
                            </p>
                            
                            <!-- Unread Badge (Optional logic if implemented) -->
                            @php
                                $unreadCount = $user->chatMessages->where('is_read', false)->where('sender_role', 'user')->count();
                            @endphp
                            
                            @if($unreadCount > 0)
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    {{ $unreadCount }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="px-6 py-12 text-center text-gray-500">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <p>Belum ada percakapan aktif.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
