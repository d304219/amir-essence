<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key for User
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign Key for Product
            $table->integer('quantity');
            $table->decimal('price', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
