<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ['business_about_us','service_description','business_hours','logo_url','banner_url','show_banner'];
        Schema::create('business_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_about_us');
            $table->string('service_description');
            $table->string('business_hours');
            $table->string('logo_url');
            $table->string('banner_url')->nullable();
            $table->string('with_banner');
            $table->integer('business_id')->unsigned();
            $table->foreign('business_id')->references('id')->on('businesses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_templates');
    }
}
