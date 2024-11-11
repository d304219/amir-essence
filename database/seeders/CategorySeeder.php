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
        $category->color = "#8B4513"; // Dark brown color for a royal, oud feel
        $category->font = "Georgia, serif"; // A classic serif font
        $category->save();

        // Category 2
        $category = new Category();
        $category->name = "Amber Blend";
        $category->id = 2;
        $category->color = "#FFBF00"; // Amber color
        $category->font = "Times New Roman, serif"; // Classic serif font
        $category->save();

        // Category 3
        $category = new Category();
        $category->name = "Woody Leather";
        $category->id = 3;
        $category->color = "#A52A2A"; // Brownish color for leather
        $category->font = "Courier New, monospace"; // Bold, structured font
        $category->save();

        // Category 4
        $category = new Category();
        $category->name = "Sandalwood Essence";
        $category->id = 4;
        $category->color = "#D2B48C"; // Tan color for sandalwood
        $category->font = "Palatino, serif"; // Elegant serif font
        $category->save();

        // Category 5
        $category = new Category();
        $category->name = "Incense & Smoke";
        $category->id = 5;
        $category->color = "#4B0082"; // Smoky purple color
        $category->font = "Verdana, sans-serif"; // Modern sans-serif font
        $category->save();
    }
}
