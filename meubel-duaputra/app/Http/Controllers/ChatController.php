<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Get messages for the current user
     */
    public function getMessages()
    {
        $messages = ChatMessage::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();
        
        return response()->json($messages);
    }

    /**
     * Send a new message
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $message = ChatMessage::create([
            'user_id' => Auth::id(),
            'sender_id' => Auth::id(),
            'sender_role' => 'user',
            'message' => $request->message,
            'is_read' => false,
        ]);

        return response()->json($message);
    }
}
