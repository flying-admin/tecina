<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_translations', function (Blueprint $table) {
            $table->smallInteger('id_category')->unsigned();
            $table->smallInteger('id_language')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();

            $table->primary(['id_category','id_language'],'category_language_primary');

            $table->foreign('id_category')
                ->references('id')->on('categories')
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
        Schema::dropIfExists('categories_translations');
    }
}
