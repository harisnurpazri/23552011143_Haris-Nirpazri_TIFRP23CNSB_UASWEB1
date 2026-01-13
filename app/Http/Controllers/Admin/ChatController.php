<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * List users with chat history
     */
    public function index()
    {
        // Get users who have sent messages, ordered by latest message
        $users = User::whereHas('chatMessages')
            ->with(['chatMessages' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->get()
            ->sortByDesc(function ($user) {
                return $user->chatMessages->first()->created_at;
            });

        return view('admin.chat.index', compact('users'));
    }

    /**
     * Show chat conversation with a specific user
     */
    public function show(User $user)
    {
        // Mark admin messages to this user as read (optional logic, but good for UX)
        // In this simple app, we can just mark all messages from user as read
        ChatMessage::where('user_id', $user->id)
            ->where('sender_role', 'user')
            ->update(['is_read' => true]);

        $messages = ChatMessage::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.chat.show', compact('user', 'messages'));
    }

    /**
     * Send reply to user
     */
    public function reply(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        ChatMessage::create([
            'user_id' => $user->id,
            'sender_id' => Auth::id(),
            'sender_role' => 'admin',
            'message' => $request->message,
            'is_read' => false, // User hasn't read it yet
        ]);

        return back();
    }
}
