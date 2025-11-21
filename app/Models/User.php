<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'role_id',
        'name',
        'password',
        'email',
        'google_id',
        'mahasiswa_id',
    ];
    public $timestamps = false;

    protected $hidden = ['password'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'user_id');
    }

    public function chatSessions()
    {
        return $this->hasMany(ChatSession::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
