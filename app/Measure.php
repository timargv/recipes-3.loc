<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    //
    protected $table = 'measures';
    protected $fillable = ['title'];

    // Количество рецептов в амоунт
    public function amounts()
    {
        return $this->hasMany(RecipeAmountIngredient::class, 'measure_id', 'id');
    }
}
