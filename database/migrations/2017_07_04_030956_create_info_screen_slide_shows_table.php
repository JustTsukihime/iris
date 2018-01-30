<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoScreenSlideShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('screen_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('screen_id')->references('id')->on('screens');
        });

        Schema::table('screens', function (Blueprint $table) {
            $table->integer('active_slide_show')->unsigned()->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('screens', function (Blueprint $table) {
            $table->dropColumn('active_slide_show');
        });

        Schema::dropIfExists('slide_shows');
    }
}
