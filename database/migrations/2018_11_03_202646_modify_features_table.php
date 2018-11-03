<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('features');
        Schema::create('features', function (Blueprint $table) {
            //
            $table->integer('package_id')->unsigned();
            $table->integer('package_feature_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('package_feature_id')->references('id')->on('package_features');
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
        Schema::table('features', function (Blueprint $table) {
            //
        });
    }
}
