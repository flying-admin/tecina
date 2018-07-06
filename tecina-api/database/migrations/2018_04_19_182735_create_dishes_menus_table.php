<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_menus', function (Blueprint $table) {
            $table->smallInteger('id_dish')->unsigned();
            $table->smallInteger('id_menu')->unsigned();

            $table->primary(['id_dish', 'id_menu']);

            $table->foreign('id_dish')
                ->references('id')->on('dishes')
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
        Schema::dropIfExists('dishes_menus');
    }
}
