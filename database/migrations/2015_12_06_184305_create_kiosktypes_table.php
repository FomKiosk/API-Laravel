<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKiosktypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiosktypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('kitchen_id')->unsigned();
            $table->timestamps();

            $table->foreign('kitchen_id')->references('id')->on('kitchens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kiosktypes');
    }
}
