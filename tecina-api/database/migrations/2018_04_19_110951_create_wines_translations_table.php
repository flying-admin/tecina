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
            $table->increments('id');
            $table->integer('id_wine')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');
            $table->string('year');

            $table->unique(['id_wine','locale']);

            $table->foreign('id_wine')
                ->references('id')->on('wines')
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
