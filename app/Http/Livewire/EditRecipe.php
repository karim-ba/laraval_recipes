<?php

namespace App\Http\Livewire;

use App\Models\Ingredient;
use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditRecipe extends Component
{
    use WithFileUploads;

    public $recipe_id;
    public Recipe $recipe;
    public $image;

    public $ingredients;

    public $selected_ingredient;
    public $ingredient_id;
    public $ingredient_quantity;

    protected $rules = [
        'recipe.name' => 'required|min:4',
        'recipe.description' => 'required|string',
        'recipe.preparation_time' => 'required|numeric|min:60',
        'recipe.price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $this->recipe = Recipe::find($this->recipe_id);
        $this->ingredients = Ingredient::all();
    }

    public function render()
    {
        $this->selected_ingredient = Ingredient::find($this->ingredient_id);

        return view('livewire.edit-recipe');
    }
    public function submit()
    {
        $this->validate();
        if ($this->image) {
            $file_name = $this->recipe->id . '.' . substr($this->image->getClientOriginalName(), -3);
            $this->image->storeAs('public/image', $file_name);
            $this->recipe->image = $file_name;
        }
        $this->recipe->save();
        session()->flash('message', 'Recipes updated.');
        return redirect()->to('/recipes');
    }

    public function addIngredient()
    {
        $this->validate([
            'ingredient_id' => 'required',
            'ingredient_quantity' => 'required|numeric',
        ]);

        if ($this->recipe->ingredients->contains($this->ingredient_id)) {
            foreach ($this->recipe->ingredients as $ingredient) {
                if ($ingredient->id == $this->ingredient_id) {
                    $ingredient->pivot->quantity += $this->ingredient_quantity;
                    $ingredient->pivot->update();
                }
                break;
            }
            $this->recipe->save();
        } else {
            $this->recipe->ingredients()->attach($this->ingredient_id, ['quantity' => $this->ingredient_quantity]);
        }
        $this->recipe = Recipe::find($this->recipe_id);
    }

    public function deleteIngredient($id)
    {
        if (count($this->recipe->ingredients) > 3) {
            $this->recipe->ingredients()->detach($id);
            $this->recipe = Recipe::find($this->recipe_id);
        }
    }
    public function deleteRecipe($id){
        $r = Recipe::destroy($id);
        $this->recipe = Recipe::find($this->recipe_id);
    }
}
