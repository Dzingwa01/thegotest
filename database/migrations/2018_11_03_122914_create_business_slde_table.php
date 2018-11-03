<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessSldeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_slide', function (Blueprint $table) {
            //
            $table->integer('business_id')->unsigned();
            $table->integer('slide_id')->unsigned();

            $table->foreign('business_id')->references('id')->on('businesses');
            $table->foreign('slide_id')->references('id')->on('slides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_slide');
    }
}
