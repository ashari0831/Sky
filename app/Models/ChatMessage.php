<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ChatRoom;
use Event;

class ChatMessage extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function(){
    //         Event::dispatch('message.created');
    //     });
    // }

    /**
     * Get the user that owns the ChatMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the chatroom that owns the ChatMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chatroom()
    {
        return $this->belongsTo(ChatRoom::class);
    }
}
