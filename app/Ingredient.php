<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    protected $table = 'ingredients';
    protected $fillable = ['title'];


    // Количество рецептов в амоунт
    public function amounts()
    {
        return $this->hasMany(RecipeAmountIngredient::class, 'ingredient_id', 'id');
    }
}
