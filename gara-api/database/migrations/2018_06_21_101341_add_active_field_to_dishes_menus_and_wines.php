<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveFieldToDishesMenusAndWines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wines', function (Blueprint $table) {
          $table->boolean('active')->default(FALSE);
        });
        Schema::table('dishes', function (Blueprint $table) {
          $table->boolean('active')->default(FALSE);
        });
        Schema::table('menus', function (Blueprint $table) {
          $table->boolean('active')->default(FALSE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
