<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->index();

            // Характеристики
            $table->string('portion')->default(0);          // Порция
            $table->string('hour')->default(0);             // Часов
            $table->string('minutes')->default(0);          // Минут

            // ЭНЕРГЕТИЧЕСКАЯ ЦЕННОСТЬ НА ПОРЦИЮ
            $table->string('calorie')->default(0);          // Калорийность
            $table->string('squirrels')->default(0);        // Белки - Ккал
            $table->string('fats')->default(0);             // Жиры - ГРАММ
            $table->string('carbohydrates')->default(0);    // Углеводы - ГРАММ
            $table->string('portion')->default(0);          // Углеводы - ГРАММ


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
        Schema::dropIfExists('recipes');
    }
}
