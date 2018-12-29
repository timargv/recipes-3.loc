<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);

        $this->call(AmountTableSeeder::class);

        $this->call(RecipesTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(MeasuresTableSeeder::class);

        $this->call(InstructionsTableSeeder::class);
        $this->call(ImagesRecipeTableSeeder::class);

    }
}
