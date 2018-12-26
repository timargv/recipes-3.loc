<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    protected $table = 'ingredients';
    protected $fillable = ['title', 'amount', 'measure_id'];

    public function recipes () {
        return $this->belongsToMany(
            Recipe::class,
            'recipe_ingredients',
            'ingredient_id',
            'recipe_id'
        );
    }

    // Связь один к одному
    public function measure ()
    {
        return $this->hasOne(Measure::class);
    }
}
