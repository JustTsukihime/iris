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
        Schema::create('info_screen_slide_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('info_screen_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('info_screen_id')->references('id')->on('info_screens');
        });

        Schema::table('info_screens', function (Blueprint $table) {
            $table->integer('active_slide_show')->unsigned()->nullable()->after('name');

            $table->foreign('active_slide_show')->references('id')->on('info_screen_slide_shows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_screens', function (Blueprint $table) {
            $table->dropForeign(['active_slide_show']);

            $table->dropColumn('active_slide_show');
        });

        Schema::dropIfExists('info_screen_slide_shows');
    }
}
