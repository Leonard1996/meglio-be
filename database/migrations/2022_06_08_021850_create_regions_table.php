<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('geographic_location_id');
            $table->unsignedBigInteger('state_id');
            $table->string('name', 30);

            $table->foreign('geographic_location_id')
                ->references('id')
                ->on('geographic_locations')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
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
        Schema::dropIfExists('regions');
    }
}
