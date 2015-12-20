<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKiosksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiosks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kiosktype_id')->unsigned();
            $table->string('name');
            $table->string('uid');
            $table->string('secret');
            $table->timestamps();

            $table->foreign('kiosktype_id')->references('id')->on('kiosktypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kiosks');
    }
}
