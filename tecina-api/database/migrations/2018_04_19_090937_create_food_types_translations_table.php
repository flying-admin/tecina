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
            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['id_food_type','locale']);

            $table->foreign('id_food_type')
                ->references('id')->on('food_types')
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
