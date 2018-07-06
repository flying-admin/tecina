<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_translations', function (Blueprint $table) {
            $table->smallInteger('drink_id')->unsigned();
            $table->smallInteger('language_id')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();

            $table->primary(['drink_id','language_id'],'drink_language_primary');

            $table->foreign('drink_id')
                ->references('id')->on('drinks')
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
        Schema::dropIfExists('drink_translations');
    }
}
