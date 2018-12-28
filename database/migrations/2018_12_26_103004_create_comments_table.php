<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->integer('user_id');
            $table->integer('reply_id')->nullable()->default(0);

            $table->text('text', 3000);

            $table->string('status')->default('acitve');
            $table->timestamps();
        });

        Schema::create('comments_spam', function (Blueprint $table) {
            $table->integer('comment_id');
            $table->integer('user_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('comments_spam');
    }
}
