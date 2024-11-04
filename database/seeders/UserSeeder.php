<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Make sure you have imported the user model


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Test Admin";
        $user->gender = "male";
        $user->email = "testadmin@gmail.com";
        $user->password = '$2y$12$kL8HXococgoPaidEpPJLhejnz3YYOLh87/BQ7oypUvxMlx8ZBRBne';
        $user->address = 'Testadminstreet 123';
        $user->isAdmin = 1;
        $user->save();
        
        $user = new User();
        $user->name = "Test User";
        $user->gender = "male";
        $user->email = "testuser@gmail.com";
        $user->password = '$2y$12$kL8HXococgoPaidEpPJLhejnz3YYOLh87/BQ7oypUvxMlx8ZBRBne';
        $user->address = 'Testuserstreet 123';
        $user->isAdmin = 0;
        $user->save();    
    }
}
