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
            $table->increments('id');
            $table->integer('id_menu')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');


            $table->unique(['id_menu','locale']);

            $table->foreign('id_menu')
                ->references('id')->on('menus')
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
