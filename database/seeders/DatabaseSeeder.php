<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Recipe::create([
            'name'=>'salade marinaire turquoise',
            'preparation_time'=>'1200',
            'description'=>'ici la description',
            'price'=>7.99,
        ]);

        Ingredient::create([
            'name'=>'laitue',
            'quantity'=>1,
            'unit'=>'kg',
            'recipe_id'=>1,
        ]);

        Ingredient::create([
            'name'=>'tomate serises',
            'quantity'=>5,
            'unit'=>'piece',
            'recipe_id'=>1,
        ]);
        Ingredient::create([
            'name'=>'huile d\'olive',
            'quantity'=>2,
            'unit'=>'cuillére de table',
            'recipe_id'=>1,
        ]);
        

        Recipe::create([
            'name'=>'Soupe  marocaine',
            'preparation_time'=>'1200',
            'description'=>'ici la description',
            'price'=>7.99,
        ]);

        Ingredient::create([
            'name'=>'tomate',
            'quantity'=>1,
            'unit'=>'kg',
            'recipe_id'=>2,
        ]);

        Ingredient::create([
            'name'=>'viande de boeuf',
            'quantity'=>5,
            'unit'=>'piece',
            'recipe_id'=>2,
        ]);
        Ingredient::create([
            'name'=>'huile d\'olive',
            'quantity'=>2,
            'unit'=>'cuillére de table',
            'recipe_id'=>2,
        ]);
        
    }
}
