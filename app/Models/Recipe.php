<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipes';

    protected $fillable = [
        'name',
        'preparation_time',
        'description',
        'image',
        'price'
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'ingredient_recipes')->withPivot('quantity');
    }
}
