<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergensTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergens_translations', function (Blueprint $table) {
            $table->smallInteger('id_allergen')->unsigned();
            $table->smallInteger('id_language')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();

            $table->primary(['id_allergen','id_language'],'allergen_language_primary');

            $table->foreign('id_allergen')
                ->references('id')->on('allergens')
                ->onDelete('cascade');

            $table->foreign('id_language')
                ->references('id')->on('languages')
                ->onDelete('cascade');
        });
    }
        //$frenchName = $allergen->getTranslation('fr')->name;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergens_translations');
    }
}
