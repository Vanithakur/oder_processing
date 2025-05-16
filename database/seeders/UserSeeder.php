<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory()->count(10)->create();

        // Optional: If you want to add a specific user (e.g., admin)
        // User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
