<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Make sure you have imported the user model
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'prince@admin.com',
            'gender' => 'male',
            'address' => 'Testadminstreet 123',
            'password' => Hash::make('AdminPassword!123'),
            'isAdmin' => 1
        ]);

        for ($i = 1; $i <= 9; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'gender' => 'male', // Alternate genders
                'address' => 'Testuserstreet ' . ($i * 10),
                'password' => Hash::make('password'),
                'isAdmin' => 0
            ]);
        }
    }
}
