<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_wines', function (Blueprint $table) {
            $table->tinyInteger('id_wine')->unsigned();
            $table->tinyInteger('id_menu')->unsigned();

            $table->primary(['id_wine', 'id_menu']);

            $table->foreign('id_wine')
                ->references('id')->on('wines')
                ->onDelete('cascade');

            $table->foreign('id_menu')
                ->references('id')->on('menus')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_wines');
    }
}
