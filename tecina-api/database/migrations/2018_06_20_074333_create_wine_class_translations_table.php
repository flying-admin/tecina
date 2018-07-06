<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineClassTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine_class_translations', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('wine_class_id')->unsigned();
            $table->smallInteger('language_id')->unsigned();
            $table->foreign('wine_class_id')
                ->references('id')->on('wine_classes')
                ->onDelete('cascade');
            $table->foreign('language_id')
                ->references('id')->on('languages')
                ->onDelete('cascade');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wine_class_translations');
    }
}
