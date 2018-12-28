<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeAmountIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_amount_ingredients', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('amount');                            // Количество
            $table->integer('recipe_id')->default(0);       // Рецепт
            $table->integer('ingredient_id')->default(0);   // Ингредиент
            $table->integer('measure_id')->default(0);      // Измерение

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_amount_ingredients');
    }
}
