<?php

use Illuminate\Database\Seeder;

class ImagesRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\ImageRecipe::create([
            'image' => 'https://s1.eda.ru/StaticContent/Photos/120131082850/120213184522/p_O.jpg',
            'recipe_id' => 1
        ]);

        \App\ImageRecipe::create([
            'image' => 'https://s2.eda.ru/StaticContent/Photos/120131083043/120213184522/p_O.jpg',
            'recipe_id' => 1
        ]);

        \App\ImageRecipe::create([
            'image' => 'https://s1.eda.ru/StaticContent/Photos/120131083434/120213184523/p_O.jpg',
            'recipe_id' => 1
        ]);
    }
}
