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
        Schema::create('slide_slide_show', function (Blueprint $table) {
            $table->integer('slide_id')->unsigned();
            $table->integer('slide_show_id')->unsigned();

            $table->primary(['slide_id', 'slide_show_id'], 'slide_id_slide_show_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slide_slide_show');
    }
}
