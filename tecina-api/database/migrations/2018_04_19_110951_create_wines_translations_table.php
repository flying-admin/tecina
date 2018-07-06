<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines_translations', function (Blueprint $table) {
            $table->smallInteger('id_wine')->unsigned();
            $table->smallInteger('id_language')->unsigned();
            $table->string('description');

            $table->primary(['id_wine','id_language'],'wine_language_primary');

            $table->foreign('id_wine')
                ->references('id')->on('wines')
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
        Schema::dropIfExists('wines_translations');
    }
}
