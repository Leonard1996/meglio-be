<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_versions', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('vehicle_model_id');
            $table->string('AM_code', 20)->primary();
            $table->string('description', 100);
            $table->string('full_description', 200);
            $table->unsignedSmallInteger('fuel_id');
            $table->unsignedSmallInteger('year');
            $table->unsignedSmallInteger('body_type_id');
            $table->string('category_id');
            $table->unsignedInteger('cubic_capacity');
            $table->string('last_registration');
            $table->string('sales_end_date');
            $table->string('first_registration');
            $table->string('sales_start_date');
            $table->unsignedSmallInteger('month');


            $table->foreign('vehicle_model_id')
                ->references('id')
                ->on('vehicle_models')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('fuel_id')
                ->references('id')
                ->on('vehicle_fuels')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('body_type_id')
                ->references('id')
                ->on('vehicle_body_types')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('category_id')
                ->references('id')
                ->on('vehicle_categories')
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
        Schema::dropIfExists('vehicle_versions');
    }
};
