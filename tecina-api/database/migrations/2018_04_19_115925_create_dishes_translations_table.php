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
            $table->increments('id');
            $table->integer('id_dish')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');

            $table->unique(['id_dish','locale']);

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
        Schema::dropIfExists('dishes_translations');
    }
}
