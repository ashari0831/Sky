<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChatMessage;
use App\Models\User;

class ChatRoom extends Model
{
    use HasFactory;
    protected $guarded = [];

   /**
    * Get the user that owns the ChatRoom
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   /**
    * Get all of the messages for the ChatRoom
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function messages()
   {
       return $this->hasMany(ChatMessage::class);
   }
    
}
