<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lecture::create([
            'name' => 'Dr. Smith',
            'email' => 'dr.smith@example.com',
            'phone' => '123-456-7890',
        ]);
        Lecture::create([
            'name' => 'Prof. Jones',
            'email' => 'prof.jones@example.com',
            'phone' => '123-456-7891',
        ]);
        Lecture::create([
            'name' => 'Dr. Williams',
            'email' => 'dr.williams@example.com',
            'phone' => '123-456-7892',
        ]);
    }
}
