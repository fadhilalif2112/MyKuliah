<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'lecture_id' => 1,
            'subject_name' => 'Web Development',
            'semester' => 3,
            'credits' => 4,
            'description' => 'Learn to build web applications.',
        ]);
        Subject::create([
            'lecture_id' => 2,
            'subject_name' => 'Mobile Development',
            'semester' => 4,
            'credits' => 4,
            'description' => 'Learn to build mobile applications.',
        ]);
        Subject::create([
            'lecture_id' => 3,
            'subject_name' => 'Data Structures',
            'semester' => 2,
            'credits' => 3,
            'description' => 'Learn about data structures.',
        ]);
        Subject::create([
            'lecture_id' => 1,
            'subject_name' => 'Algorithms',
            'semester' => 2,
            'credits' => 3,
            'description' => 'Learn about algorithms.',
        ]);
        Subject::create([
            'lecture_id' => 2,
            'subject_name' => 'Database Systems',
            'semester' => 3,
            'credits' => 3,
            'description' => 'Learn about database systems.',
        ]);
    }
}
