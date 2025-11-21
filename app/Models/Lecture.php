<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';
    protected $fillable = ['name', 'email', 'phone'];
    public $timestamps = false;

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'lecture_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'lecture_id');
    }
}
