<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('craft', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('seller_id')->unsigned();
            $table->string('imgname1')->nullable();
            $table->string('imgname2')->nullable();
            $table->string('imgname3')->nullable();
            $table->integer('price');
            $table->integer('quntity');
            $table->string('handicrafttype');

            $table->foreign('seller_id')->references('id')->on('users');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('craft');
    }
}
