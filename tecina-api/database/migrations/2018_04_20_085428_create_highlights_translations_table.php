<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighlightsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('highlights_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_highlight')->unsigned();
            $table->integer('id_language')->unsigned();
            $table->string('name');
            $table->string('description');

            $table->unique(['id_highlight','id_language']);

            $table->foreign('id_highlight')
                ->references('id')->on('highlights')
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
        Schema::dropIfExists('highlights_translations');
    }
}
