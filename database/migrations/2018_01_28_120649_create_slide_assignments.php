<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideAssignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_screen_slide_info_screen_slide_show', function (Blueprint $table) {
            $table->integer('info_screen_slide_id')->unsigned();
            $table->integer('info_screen_slide_show_id')->unsigned();

            $table->primary(['info_screen_slide_id', 'info_screen_slide_show_id'], 'slide_id_slide_show_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_screen_slide_info_screen_slide_show');
    }
}
