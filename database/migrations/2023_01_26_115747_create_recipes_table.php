<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name',120)->unique();
            $table->string('preparation_time',100);
            $table->longText('description');
            $table->string('image',191)->nullable();
            $table->decimal('price',9,3)->default(0);
            $table->timestamps();
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('quantity',9,3)->default(0);
            $table->string('unit'); // unité de mesure de qt
            $table->unsignedBigInteger('recipe_id');
            $table->timestamps();
            
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('recipes');
    }
}
