<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $table = 'todolists';
    protected $fillable = [
        'user_id',
        'document_id',
        'category_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
