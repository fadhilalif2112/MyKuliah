<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';
    protected $fillable = ['name', 'session_id', 'sender_type', 'message'];
    public $timestamps = false;

    public function chatSession()
    {
        return $this->belongsTo(ChatSession::class, 'session_id');
    }
}
