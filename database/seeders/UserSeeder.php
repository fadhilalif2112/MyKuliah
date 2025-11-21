<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'role_id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'mahasiswa_id' => 'admin123',
        ]);

        // Regular User 1
        User::create([
            'role_id' => 2,
            'name' => 'Regular User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'mahasiswa_id' => 'user123',
        ]);

        // Regular User 2
        User::create([
            'role_id' => 2,
            'name' => 'Regular User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'mahasiswa_id' => 'user456',
        ]);
    }
}