<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
        'lecture_id',
        'subject_name',
        'semester',
        'credits',
        'description',
    ];
    public $timestamps = false;

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'subject_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }
}
