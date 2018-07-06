<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesFoodTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_food_types', function (Blueprint $table) {
            $table->smallInteger('id_food_type')->unsigned();
            $table->smallInteger('id_dish')->unsigned();

            $table->primary(['id_food_type', 'id_dish']);

            $table->foreign('id_food_type')
                ->references('id')->on('food_types')
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
        Schema::dropIfExists('dishes_food_types');
    }
}
