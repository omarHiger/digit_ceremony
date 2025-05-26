<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/UserSeeder.php
    public function run()
    {
        // Create Owner
        \App\Models\User::create([
            'name' => 'System Owner',
            'email' => 'owner@digit.com',
            'password' => bcrypt('password'),  // Password is "password"
            'role' => 'owner'
        ]);

        // Create 5 Normal Users
        $users = [
            ['name' => 'User One', 'email' => 'user1@digit.com'],
            ['name' => 'User Two', 'email' => 'user2@digit.com'],
            ['name' => 'User Three', 'email' => 'user3@digit.com'],
            ['name' => 'User Four', 'email' => 'user4@digit.com'],
            ['name' => 'User Five', 'email' => 'user5@digit.com'],
        ];

        foreach ($users as $user) {
            \App\Models\User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
                'role' => 'user'
            ]);
        }
    }
}
