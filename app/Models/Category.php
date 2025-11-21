<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description'];
    public $timestamps = false;

    // One category has many todolists
    public function todolists()
    {
        return $this->hasMany(Todolist::class, 'category_id');
    }
}
