<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineTypesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine_types_translations', function (Blueprint $table) {
            $table->integer('id_wine_type')->unsigned();
            $table->integer('id_language')->unsigned();
            $table->string('name');

            $table->primary(['id_wine_type','id_language'], 'wine_type_language_primary');

            $table->foreign('id_wine_type')
                ->references('id')->on('wine_types')
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
        Schema::dropIfExists('wine_types_translations');
    }
}
