<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageRecipe extends Model
{
    //

    protected $table = 'recipe_images';
    protected $fillable = ['image', 'recipe_id'];


}
