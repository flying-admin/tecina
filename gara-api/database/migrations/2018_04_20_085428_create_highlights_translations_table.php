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
            $table->tinyInteger('id_highlight')->unsigned();
            $table->tinyInteger('id_language')->unsigned();
            $table->string('name');
            $table->string('description');

            $table->primary(['id_highlight','id_language'], 'highlight_language_primary');

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
