<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunalTerritoriesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communal_territories_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('communal_territory_id');
            $table->string('nuts1_2010_code', 5)->nullable();
            $table->string("nuts2_2010_code", 5)->nullable();
            $table->string("nuts3_2010_code", 5)->nullable();
            $table->string("nuts1_2021_code", 5)->nullable();
            $table->string("nuts2_2021_code", 5)->nullable();
            $table->string("nuts3_2021_code", 5)->nullable();

            $table->foreign('communal_territory_id')
                ->references('id')
                ->on('communal_territories')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communal_territories_details');
    }
}
