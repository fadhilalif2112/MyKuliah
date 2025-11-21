<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'file_attachment',
    ];

    public function todolists()
    {
        return $this->hasMany(Todolist::class, 'document_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
