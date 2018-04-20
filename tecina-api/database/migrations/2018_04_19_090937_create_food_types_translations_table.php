<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTypesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_types_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_food_type')->unsigned();
            $table->integer('id_language')->unsigned();
            $table->string('name');

            $table->unique(['id_food_type','id_language']);

            $table->foreign('id_food_type')
                ->references('id')->on('food_types')
                ->onDelete('cascade');

            $table->foreign('id_language')
                ->references('id')->on('languages')
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
        Schema::dropIfExists('food_types_translations');
    }
}
