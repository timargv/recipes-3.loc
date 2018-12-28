<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $fillable = [
        'title', 'user_id', 'portion', 'hour', 'minutes',
        'calorie', 'squirrels', 'fats', 'carbohydrates',
        'status', 'confirmed_recipe'];


    // Автор рецепта
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    // Все Картинки рецепта
    public function images()
    {
        return $this->hasMany(ImageRecipe::class, 'recipe_id', 'id');
    }

    // Все Картинки рецепта
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCommentCountAttribute(){
        return $this->comments->count();
    }


    // Связь с Ингредиенты  многие ко многим
    public function ingredients()
    {
        return $this->belongsToMany(
            Ingredient::class,
            'recipe_ingredients',
            'recipe_id',
            'ingredient_id'
        );
    }
    
}
