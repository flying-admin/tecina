<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineVarietiesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine_variety_translations', function (Blueprint $table) {
            $table->smallInteger('id_wine_variety')->unsigned();
            $table->smallInteger('id_language')->unsigned();
            $table->string('name');

            $table->primary(['id_wine_variety','id_language'],'wine_variety_language_primary');

            $table->foreign('id_wine_variety')
                ->references('id')->on('wine_varieties')
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
        Schema::dropIfExists('wine_variety_translations');
    }
}
