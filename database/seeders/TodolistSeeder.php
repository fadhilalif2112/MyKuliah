<?php

namespace Database\Seeders;

use App\Models\Todolist;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [1, 2, 3]; // 1:Task, 2:Extra, 3:Exam

        foreach ($categories as $category_id) {
            for ($i = 1; $i <= 3; $i++) {
                Todolist::create([
                    'category_id' => $category_id,
                    'title' => "Todolist {$i} for category {$category_id}",
                    'description' => "Description for todolist {$i}",
                    'status' => 'doing',
                    'priority' => 'medium',
                    'due_date' => Carbon::now()->addDays(rand(1, 30)),
                ]);
            }
        }
    }
}
