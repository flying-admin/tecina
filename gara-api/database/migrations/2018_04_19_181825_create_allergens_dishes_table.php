<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergensDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergens_dishes', function (Blueprint $table) {
            $table->tinyInteger('id_allergen')->unsigned();
            $table->tinyInteger('id_dish')->unsigned();

            $table->primary(['id_allergen', 'id_dish']);

            $table->foreign('id_allergen')
                ->references('id')->on('allergens')
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
        Schema::dropIfExists('allergens_dishes');
    }
}
