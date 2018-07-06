<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesWineVarietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines_wine_varieties', function (Blueprint $table) {
            $table->smallInteger('id_wine')->unsigned();
            $table->smallInteger('id_wine_variety')->unsigned();

            $table->primary(['id_wine', 'id_wine_variety']);

            $table->foreign('id_wine')
                ->references('id')->on('wines')
                ->onDelete('cascade');

            $table->foreign('id_wine_variety')
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
        Schema::dropIfExists('wines_wine_varieties');
    }
}
