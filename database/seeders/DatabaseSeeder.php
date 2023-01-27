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

        
        Ingredient::create([
            'name'=>'tomate cerise',
            'unit'=>'grammes',
        ]);

        Ingredient::create([
            'name'=>'cheddar cheese',
            'unit'=>'grammes',
        ]);

        Ingredient::create([
            'name'=>'viande de boeuf',
            'unit'=>'grammes',
        ]);

        Ingredient::create([
            'name'=>'huile d\'olive',
            'unit'=>'Millilitres',
        ]);
        
        
        Ingredient::create([
            'name'=>'Farine',
            'unit'=>'grammes',
        ]);
        
        
        Ingredient::create([
            'name'=>'Laitue',
            'unit'=>'grammes',
        ]);
        
        $salade = Recipe::create([
            'name'=>'salade marinaire turquoise',
            'preparation_time'=>'1200',
            'description'=>'How would you describe a salad?
            a usually cold dish consisting of vegetables, as lettuce,
            tomatoes, and cucumbers, covered with a dressing and sometimes
            containing seafood, meat, or eggs.',
            'price'=>7.99,
        ]);

        $salade->ingredients()->attach([
            1 => ['quantity' => 12],
            2 => ['quantity' => 250],
            4 => ['quantity' => 3],
        ]);
        
        $soupe = Recipe::create([
            'name'=>'Soupe marocaine',
            'preparation_time'=>'1200',
            'description'=>'ici la description',
            'price'=>7.99,
        ]);

        $soupe->ingredients()->attach([
            1 => ['quantity' => 12],
            3 => ['quantity' => 250],
            5 => ['quantity' => 300],
        ]);
        
    }
}
