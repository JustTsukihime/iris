<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoScreenSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_screen_slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('info_screen_id')->unsigned();
            $table->string('name');
            $table->string('url');
            $table->timestamps();

            $table->foreign('info_screen_id')->references('id')->on('info_screens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_screen_slides');
    }
}
