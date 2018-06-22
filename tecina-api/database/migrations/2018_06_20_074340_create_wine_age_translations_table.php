<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineAgeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine_age_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wine_age_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->foreign('wine_age_id')
                ->references('id')->on('wine_ages')
                ->onDelete('cascade');
            $table->foreign('language_id')
                ->references('id')->on('languages')
                ->onDelete('cascade');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wine_age_translations');
    }
}
