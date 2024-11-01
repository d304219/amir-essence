<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('quantity')->default(0); // Set default value
            $table->integer('volume')->nullable();
            $table->text('description')->nullable();
            $table->text('ingredients')->nullable();
            $table->string('img_file')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign Key
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
