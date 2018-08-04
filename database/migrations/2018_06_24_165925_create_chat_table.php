<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            
            $table->integer('from')->unsigned();
            $table->integer('to')->unsigned();
            $table->text('message');
            $table->boolean('seen')->default(0);

            $table->foreign('to')->references('id')->on('users');
            $table->foreign('from')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
