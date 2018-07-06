<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_translations', function (Blueprint $table) {
            $table->smallInteger('id_dish')->unsigned();
            $table->smallInteger('id_language')->unsigned();
            $table->string('name');
            $table->string('description');

            $table->primary(['id_dish','id_language'],'dish_language_primary');

            $table->foreign('id_dish')
                ->references('id')->on('dishes')
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
        Schema::dropIfExists('dishes_translations');
    }
}
