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
            $table->increments('id');
            $table->integer('id_wine_types')->unsigned();
            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['id_wine_types','locale']);

            $table->foreign('id_wine_types')
                ->references('id')->on('wine_types')
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
