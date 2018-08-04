<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
               $table->increments('id');
            $table->timestamps();
            $table->text('answer');
            $table->integer('likes')->default('0');
            $table->integer('dislikes')->default('0');
            $table->integer('user_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->foreign ('user_id')->references('id')->on('users');
            $table->foreign ('question_id')->references('id')->on('question');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer');
    }
}
