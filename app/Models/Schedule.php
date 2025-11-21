<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = [
        'subject_id',
        'lecture_id',
        'user_id',
        'days',
        'start_at',
        'end_at',
        'room',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
