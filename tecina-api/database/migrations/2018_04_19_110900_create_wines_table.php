<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->smallInteger('id_wine_type')->unsigned()->nullable();
            $table->smallInteger('id_do')->unsigned()->nullable();
            $table->string('year')->nullable();

            $table->foreign('id_wine_type')
                ->references('id')->on('wine_types');

            $table->foreign('id_do')
                ->references('id')->on('do');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wines');
    }
}
