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
        Schema::create('insurance_request_vehicles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('request_id')->unsigned();
            $table->string('vehicle_plate');
            $table->string('vehicle_brand_code');
            $table->string('vehicle_model_code');
            $table->string('vehicle_version_code');
            $table->string('vehicle_year');
            $table->string('vehicle_month');
            $table->string('vehicle_purchased_year');
            $table->string('theft_protection_code');
            $table->boolean('tow_hook');
            $table->timestamps();

            $table->foreign('request_id')
                ->references('id')
                ->on('insurance_requests')
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
        Schema::dropIfExists('insurance_request_vehicles');
    }
};
