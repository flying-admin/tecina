<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_dishes', function (Blueprint $table) {
            $table->tinyInteger('id_category')->unsigned();
            $table->tinyInteger('id_dish')->unsigned();

            $table->primary(['id_category', 'id_dish']);

            $table->foreign('id_category')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('id_dish')
                ->references('id')->on('dishes')
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
        Schema::dropIfExists('categories_dishes');
    }
}
