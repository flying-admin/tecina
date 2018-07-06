<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_translations', function (Blueprint $table) {
            $table->tinyInteger('id_menu')->unsigned();
            $table->tinyInteger('id_language')->unsigned();
            $table->string('name');
            $table->string('description');

            $table->primary(['id_menu','id_language'],'menu_language_primary');

            $table->foreign('id_menu')
                ->references('id')->on('menus')
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
        Schema::dropIfExists('menus_translations');
    }
}
