<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schedules for User 1 (ID: 2)
        Schedule::create([
            'user_id' => 2,
            'subject_id' => 1,
            'lecture_id' => 1,
        ]);
        Schedule::create([
            'user_id' => 2,
            'subject_id' => 2,
            'lecture_id' => 2,
        ]);
        Schedule::create([
            'user_id' => 2,
            'subject_id' => 3,
            'lecture_id' => 3,
        ]);

        // Schedules for User 2 (ID: 3)
        Schedule::create([
            'user_id' => 3,
            'subject_id' => 4,
            'lecture_id' => 1,
        ]);
        Schedule::create([
            'user_id' => 3,
            'subject_id' => 5,
            'lecture_id' => 2,
        ]);
        Schedule::create([
            'user_id' => 3,
            'subject_id' => 1,
            'lecture_id' => 3,
        ]);
    }
}
