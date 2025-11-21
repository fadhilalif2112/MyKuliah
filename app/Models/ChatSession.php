<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    protected $table = 'chat_sessions';
    protected $fillable = ['user_id', 'title'];
    public const UPDATED_AT = null;

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class, 'session_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
