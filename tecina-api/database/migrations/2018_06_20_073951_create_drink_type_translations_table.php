<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_type_translations', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->integer('drink_type_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->foreign('drink_type_id')
                ->references('id')->on('drink_types')
                ->onDelete('cascade');
            $table->foreign('language_id')
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
        Schema::dropIfExists('drink_type_translations');
    }
}
