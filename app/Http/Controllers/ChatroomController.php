<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

class ChatroomController extends Controller
{
    public function storeMessage(Request $req)
    {
        $data = $req->validate([
            'chat_room_id'=>'',
            'message'=>'required',
        ]);

        ChatMessage::create([
            'chat_room_id' => $data['chat_room_id'],
            'user_id' => Auth::id(),
            'message' => $data['message'],
        ]);

         return redirect('/chatroom');
    }

    function ttt()
    {
        return redirect('/');
    }
}
