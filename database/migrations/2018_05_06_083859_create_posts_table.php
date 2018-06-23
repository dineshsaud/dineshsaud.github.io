<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumtext('body'); 
            $table->timestamps();
        });

        Schema::create('user_post', function(Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('post_id')
                    ->references('id')->on('posts')
                    ->onUpdate('cascade')->onDelete('restrict');

            $table->primary(['user_id' , 'post_id']);

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
