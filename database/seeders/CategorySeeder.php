<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Category 1
        $category = new Category();
        $category->name = "Royal Oud";
        $category->id = 1;
        $category->save();

        // Category 2
        $category = new Category();
        $category->name = "Amber Blend";
        $category->id = 2;
        $category->save();

        // Category 4
        $category = new Category();
        $category->name = "Woody Leather";
        $category->id = 3;
        $category->save();

        // Category 8
        $category = new Category();
        $category->name = "Sandalwood Essence";
        $category->id = 4;
        $category->save();

        // Category 9
        $category = new Category();
        $category->name = "Incense & Smoke";
        $category->id = 5;
        $category->save();
    }
}
