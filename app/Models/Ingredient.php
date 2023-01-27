<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $table = 'ingredients';

    protected $fillable = [
        'name',
        'unit',
        'recipe_id',
    ];
    /**
     * The roles that belong to the user.
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class,'ingredient_recipes');
    }
}
