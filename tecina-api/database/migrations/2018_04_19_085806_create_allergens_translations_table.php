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
            $table->increments('id');
            $table->integer('id_allergen')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');

            $table->unique(['id_allergen','locale']);

            $table->foreign('id_allergen')
                ->references('id')->on('allergens')
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
