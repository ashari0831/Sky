<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RecentChat extends AbstractWidget
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
            $room = ChatRoom::find($this->config['chat_room_id']);
            $user = Auth::user();
            $admin = User::where('usertype', 'admin')->get();
            $messages = ChatMessage::where('chat_room_id', $this->config['chat_room_id'])->get();
            
            $unreadMsg = ChatMessage::where('chat_room_id', $this->config['chat_room_id'])->
            where('user_status', 'unread')->get();
            foreach ($unreadMsg as $msg) {
                $msg->user_status = 'read';
                $msg->save();
            }
            // $adminMessages = ChatMessage::where('chat_room_id', $this->config['chat_room_id'])->
            // where('usertype', 'admin')->get();

            return view('chatroom', compact('room', 'messages','user', 'admin'));

            //'config' => $this->config,
    }
}
