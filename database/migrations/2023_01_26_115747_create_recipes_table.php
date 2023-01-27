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
            $table->string('unit');// unité de mesure : (Litre, gramme, pieces,Cuillére a café)
            $table->timestamps();
            
        });

        
        Schema::create('ingredient_recipes', function (Blueprint $table) {
            $table->id();
            $table->decimal('quantity',8,2)->default(0);
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->timestamps();
            
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_recipes');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('recipes');
    }
}
