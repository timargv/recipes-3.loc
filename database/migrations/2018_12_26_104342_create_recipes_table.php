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

            // Автор
            $table->integer('user_id')->default(1);
            $table->integer('category_id');

            $table->string('title', 255)->index();
            $table->text('text');

            // Характеристики
            $table->integer('portion')->default(0);          // Порция
            $table->integer('hour')->default(0);             // Часов
            $table->integer('minutes')->default(0);          // Минут

            // ЭНЕРГЕТИЧЕСКАЯ ЦЕННОСТЬ НА ПОРЦИЮ
            $table->float('calorie')->nullable()->default(0);          // Калорийность
            $table->float('squirrels')->nullable()->default(0);        // Белки - Ккал
            $table->float('fats')->nullable()->default(0);             // Жиры - ГРАММ
            $table->float('carbohydrates')->nullable()->default(0);    // Углеводы - ГРАММ


            $table->string('status', 16)->default('active');            // Статус ВКЛ/ВЫКЛ
            $table->string('confirmed_recipe', 16)->default('yeas');    // Подтвержденный Рецепт

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
