<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeProvinceClassAgeToWine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wines', function (Blueprint $table) {
          $table->tinyInteger('province_id')->unsigned()->nullable();
          $table->foreign('province_id')
              ->references('id')->on('provinces');

          $table->tinyInteger('wine_age_id')->unsigned()->nullable();
          $table->foreign('wine_age_id')
              ->references('id')->on('wine_ages');

          $table->tinyInteger('wine_class_id')->unsigned()->nullable();
          $table->foreign('wine_class_id')
              ->references('id')->on('wine_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wines', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('wine_age_id');
            $table->dropColumn('wine_class_id');
        });
    }
}
