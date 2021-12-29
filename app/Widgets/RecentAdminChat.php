<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RecentAdminChat extends AbstractWidget
{
    //public $reloadTimeout = 5;
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $room = ChatRoom::find($this->config['chat_room_id']);
        $user = $room->user;
        //dd($user);
        $admin = Auth::user();
        $messages = ChatMessage::where('chat_room_id', $this->config['chat_room_id'])->get();

        $unreadMsg = ChatMessage::where('chat_room_id', $this->config['chat_room_id'])->
        where('status', 'unread')->get();
        foreach ($unreadMsg as $msg) {
            $msg->status = 'read';
            $msg->save();
        }

       return view('admin.chatroom', compact('room','messages','admin','user'));
       
        
    }
}
