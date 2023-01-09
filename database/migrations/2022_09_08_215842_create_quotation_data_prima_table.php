<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_data_prima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id');
            $table->string('quotation_prima_id');
            $table->dateTime('data_fine_sconto_anticipo')->nullable();
            $table->boolean('ripara_prima')->default('0');
            $table->string('issuing_company')->nullable();
            $table->boolean('can_be_saved')->default('0');
            $table->boolean('has_early_discount')->default('0');
            $table->boolean('has_pressure_discount')->default('0');
            $table->dateTime('early_discount_expiration_date')->nullable();
            $table->dateTime('early_discount_expiration_date_utc')->nullable();
            $table->dateTime('pressure_discount_expiration_date')->nullable();
            $table->dateTime('pressure_discount_expiration_date_utc')->nullable();
            $table->string('monthly_coverages_schedule')->nullable();
            $table->string('payment_frequencies')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qoutation_data');
    }
};
