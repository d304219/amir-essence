<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Make sure you have imported the Product model

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        
        $product = new Product();
        $product->name = "Royal Oud";
        $product->price = 120.00; // Set a price
        $product->quantity = 50;
        $product->volume = 100; // in ml
        $product->description = "A luxurious oud fragrance with a royal touch, perfect for evening wear.";
        $product->ingredients = "Oud, sandalwood, amber, musk";
        $product->img_file = "royal_oud.jpg";
        $product->category_id = 1; // Set category_id to match the ID of "Royal Oud" category
        $product->save();


        // Product 2
        $product = new Product();
        $product->name = "Rose Musk";
        $product->price = 85.50;
        $product->quantity = 15;
        $product->volume = 80;
        $product->description = "A floral musk fragrance with the essence of pure roses and musk.";
        $product->ingredients = "Rose, Musk, Vanilla";
        $product->img_file = "perfume-mockup.png";
        $product->category_id = 2;
        $product->save();

        // Product 3
        $product = new Product();
        $product->name = "Bakhoor Al Areej";
        $product->price = 75.99;
        $product->quantity = 20;
        $product->volume = 50;
        $product->description = "A sweet and woody fragrance inspired by traditional bakhoor incense.";
        $product->ingredients = "Bakhoor, Oud, Cedar";
        $product->img_file = "perfume-mockup.png";
        $product->category_id = 1;
        $product->save();

        // Product 4
        $product = new Product();
        $product->name = "Musk Tahara";
        $product->price = 60.00;
        $product->quantity = 30;
        $product->volume = 30;
        $product->description = "A pure white musk fragrance, clean and comforting.";
        $product->ingredients = "White Musk, Floral Notes";
        $product->img_file = "perfume-mockup.png";
        $product->category_id = 2;
        $product->save();

        // Product 5
        $product = new Product();
        $product->name = "Amber Oud";
        $product->price = 95.00;
        $product->quantity = 12;
        $product->volume = 90;
        $product->description = "A rich amber fragrance blended with oud, for a luxurious experience.";
        $product->ingredients = "Amber, Oud, Patchouli";
        $product->img_file = "perfume-mockup.png";
        $product->category_id = 3;
        $product->save();

        // Add more products up to 15
        // Product 6
        $product = new Product();
        $product->name = "Sandalwood Essence";
        $product->price = 50.00;
        $product->quantity = 25;
        $product->volume = 75;
        $product->description = "Warm sandalwood fragrance with earthy undertones.";
        $product->ingredients = "Sandalwood, Cedar, Musk";
        $product->img_file = "perfume-mockup.png";
        $product->category_id = 3;
        $product->save();

    }
}
