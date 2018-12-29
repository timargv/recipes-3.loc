<?php

use App\RecipeAmountIngredient;
use Illuminate\Database\Seeder;

class AmountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RecipeAmountIngredient::create([
            'amount' => 100,
            'recipe_id' => 1,
            'ingredient_id' => 1,
            'measure_id' => 1,

        ]);
        RecipeAmountIngredient::create([
            'amount' => 200,
            'recipe_id' => 1,
            'ingredient_id' => 2,
            'measure_id' => 2,
        ]);
    }
}
