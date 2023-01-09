<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('communal_territory_id');
            $table->integer('progressive_id');
            $table->string("alphanumeric_id", 8)->nullable();
            $table->string("name", 100);
            $table->string('italian_name', 100)->nullable();
            $table->string('other_name', 100)->nullable();
            $table->boolean('is_province');
            $table->integer('numeric_id');
            $table->integer('numeric_2010_2016_id')->nullable();
            $table->integer('numeric_2006_2009_id')->nullable();
            $table->integer('numeric_1995_2005_id')->nullable();
            $table->string('cadastral_code', 4)->nullable();
            $table->string('cap', 10)->nullable();

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
        Schema::dropIfExists('communes');
    }
}
