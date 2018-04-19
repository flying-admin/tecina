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
        Schema::create('wine_varieties_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_wine_varieties')->unsigned();
            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['id_wine_varieties','locale']);

            $table->foreign('id_wine_varieties')
                ->references('id')->on('wine_varieties')
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
        Schema::dropIfExists('wine_varieties_translations');
    }
}
