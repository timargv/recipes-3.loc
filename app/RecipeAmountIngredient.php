<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeAmountIngredient extends Model
{

    protected $table = 'recipe_amount_ingredients';
    protected $fillable = ['amount', 'recipe_id', 'ingredient_id', 'measure_id'];

    public function ingredient () {
        return $this->belongsTo(Ingredient::class, 'ingredient_id', 'id');
    }

    public function recipe () {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }

    public function measure () {
        return $this->belongsTo(Measure::class, 'measure_id', 'id');
    }
}
