<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;
    //
    protected $table = 'categories';
    protected $fillable = ['title', 'parent_id'];

    // Все Картинки рецепта
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'category_id', 'id');
    }
}
