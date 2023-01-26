<?php

namespace App\Http\Livewire;

use App\Models\Ingredient;
use App\Models\Recipe;
use Livewire\Component;

class EditRecipe extends Component
{
    public $recipe_id;
    public Recipe $recipe;
    public $ingredient_name;
    public $ingredient_quantity;
    public $ingredient_unit;
    protected $rules = [
        'recipe.name' => 'required|min:4',
        'recipe.description' => 'required|alpha_num',
        'recipe.preparation_time' => 'required|numeric|min:60',
        'recipe.price' => 'required|numeric|min:0',
        'recipe.image' => 'required|numeric|min:0',
    ];

    public function mount(){
        $this->recipe = Recipe::find($this->recipe_id);
    }

    public function render()
    {
        $this->recipe = Recipe::find($this->recipe_id);
        return view('livewire.edit-recipe');
    }
    public function submit(){
        $this->validate();
        $this->recipe->save();
    }
    public function addIngredient(){
        $this->validate(['ingredient_name'=>'required|min:4', 
        'ingredient_quantity' => 'required|numeric',
        'ingredient_description' => 'required|alpha_num']);
        Ingredient::create(['name'=>$this->ingredient_name,'ingredient_quantity' => $this->ingredient_quantity,
        'ingredient_unit' => $this->ingredient_unit]);
    }

    public function deleteIngredient($id){
        Ingredient::destroy($id);
    }
}
