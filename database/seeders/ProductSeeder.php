<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Royal Oud Category (Category ID 1)
        $product = new Product();
        $product->name = "Royal Oud";
        $product->price = 120.00;
        $product->quantity = 50;
        $product->volume = 100;
        $product->description = "A luxurious oud fragrance with a royal touch, perfect for evening wear.";
        $product->ingredients = "Oud, sandalwood, amber, musk";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->name = "Bakhoor Al Areej";
        $product->price = 75.99;
        $product->quantity = 20;
        $product->volume = 50;
        $product->description = "A sweet and woody fragrance inspired by traditional bakhoor incense.";
        $product->ingredients = "Bakhoor, Oud, Cedar";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->name = "Oud Majestic";
        $product->price = 130.00;
        $product->quantity = 18;
        $product->volume = 100;
        $product->description = "An intense oud fragrance with earthy undertones, embodying luxury.";
        $product->ingredients = "Oud, Amber, Patchouli";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->name = "Royal Night Oud";
        $product->price = 115.00;
        $product->quantity = 25;
        $product->volume = 70;
        $product->description = "A smooth, rich oud with hints of spice, perfect for special occasions.";
        $product->ingredients = "Oud, Cinnamon, Saffron";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 1;
        $product->save();

        // Amber Blend Category (Category ID 2)
        $product = new Product();
        $product->name = "Rose Musk";
        $product->price = 85.50;
        $product->quantity = 15;
        $product->volume = 80;
        $product->description = "A floral musk fragrance with the essence of pure roses and musk.";
        $product->ingredients = "Rose, Musk, Vanilla";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 2;
        $product->save();

        $product = new Product();
        $product->name = "Musk Tahara";
        $product->price = 60.00;
        $product->quantity = 30;
        $product->volume = 30;
        $product->description = "A pure white musk fragrance, clean and comforting.";
        $product->ingredients = "White Musk, Floral Notes";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 2;
        $product->save();

        $product = new Product();
        $product->name = "Amber Rose";
        $product->price = 90.00;
        $product->quantity = 20;
        $product->volume = 60;
        $product->description = "A delicate blend of amber and rose for a warm, floral experience.";
        $product->ingredients = "Amber, Rose, Sandalwood";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 2;
        $product->save();

        $product = new Product();
        $product->name = "Mystic Amber";
        $product->price = 70.00;
        $product->quantity = 22;
        $product->volume = 70;
        $product->description = "A deep, resinous amber with hints of spice and musk.";
        $product->ingredients = "Amber, Musk, Cinnamon";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 2;
        $product->save();

        // Woody Leather Category (Category ID 3)
        $product = new Product();
        $product->name = "Amber Oud";
        $product->price = 95.00;
        $product->quantity = 12;
        $product->volume = 90;
        $product->description = "A rich amber fragrance blended with oud, for a luxurious experience.";
        $product->ingredients = "Amber, Oud, Patchouli";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 3;
        $product->save();

        $product = new Product();
        $product->name = "Leather Accord";
        $product->price = 110.00;
        $product->quantity = 10;
        $product->volume = 100;
        $product->description = "Bold leather fragrance with hints of tobacco and spice.";
        $product->ingredients = "Leather, Tobacco, Black Pepper";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 3;
        $product->save();

        $product = new Product();
        $product->name = "Woody Mirage";
        $product->price = 80.00;
        $product->quantity = 18;
        $product->volume = 80;
        $product->description = "A forest-inspired woody scent with hints of cedar and oak.";
        $product->ingredients = "Cedarwood, Oak, Musk";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 3;
        $product->save();

        $product = new Product();
        $product->name = "Leather Spice";
        $product->price = 100.00;
        $product->quantity = 14;
        $product->volume = 85;
        $product->description = "An intense leather fragrance with spicy undertones.";
        $product->ingredients = "Leather, Clove, Pepper";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 3;
        $product->save();

        // Sandalwood Essence Category (Category ID 4)
        $product = new Product();
        $product->name = "Sandalwood Essence";
        $product->price = 50.00;
        $product->quantity = 25;
        $product->volume = 75;
        $product->description = "Warm sandalwood fragrance with earthy undertones.";
        $product->ingredients = "Sandalwood, Cedar, Musk";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 4;
        $product->save();

        $product = new Product();
        $product->name = "Silk Sandal";
        $product->price = 70.00;
        $product->quantity = 18;
        $product->volume = 60;
        $product->description = "Smooth and soft sandalwood with a hint of vanilla.";
        $product->ingredients = "Sandalwood, Vanilla, Jasmine";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 4;
        $product->save();

        $product = new Product();
        $product->name = "Golden Sandal";
        $product->price = 55.00;
        $product->quantity = 20;
        $product->volume = 65;
        $product->description = "A refined sandalwood fragrance with hints of spice and warmth.";
        $product->ingredients = "Sandalwood, Cardamom, Musk";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 4;
        $product->save();

        $product = new Product();
        $product->name = "Sandalwood Noir";
        $product->price = 75.00;
        $product->quantity = 16;
        $product->volume = 90;
        $product->description = "A dark, mysterious sandalwood fragrance with smoky undertones.";
        $product->ingredients = "Sandalwood, Smoke, Leather";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 4;
        $product->save();

        // Incense & Smoke Category (Category ID 5)
        $product = new Product();
        $product->name = "Mystic Smoke";
        $product->price = 65.00;
        $product->quantity = 20;
        $product->volume = 70;
        $product->description = "A smoky incense fragrance with hints of myrrh and frankincense.";
        $product->ingredients = "Myrrh, Frankincense, Patchouli";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 5;
        $product->save();

        $product = new Product();
        $product->name = "Incense Noir";
        $product->price = 85.00;
        $product->quantity = 15;
        $product->volume = 50;
        $product->description = "Dark incense fragrance with smoky undertones and a touch of oud.";
        $product->ingredients = "Oud, Smoky Notes, Clove";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 5;
        $product->save();

        $product = new Product();
        $product->name = "Ashen Flame";
        $product->price = 78.00;
        $product->quantity = 12;
        $product->volume = 55;
        $product->description = "A fiery, smoky scent that captures the warmth of burning embers.";
        $product->ingredients = "Smoke, Cedarwood, Vetiver";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 5;
        $product->save();

        $product = new Product();
        $product->name = "Exotic Smoke";
        $product->price = 90.00;
        $product->quantity = 10;
        $product->volume = 65;
        $product->description = "An exotic blend of incense with hints of spice and deep woods.";
        $product->ingredients = "Incense, Spice, Oud";
        $product->img_file = "img/products/1730725032.png";
        $product->category_id = 5;
        $product->save();
    }
}
