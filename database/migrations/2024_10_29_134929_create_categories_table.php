<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name')->unique();
            $table->string('color')->nullable();
            $table->string('font')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
