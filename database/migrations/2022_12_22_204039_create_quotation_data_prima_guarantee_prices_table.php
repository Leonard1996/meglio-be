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
        Schema::create('quotation_data_prima_guarantee_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_data_prima_guarantee_id');
            $table->string('actual_limit')->nullable();
            $table->string('ripara_prima')->nullable();
            $table->string('deductible')->nullable();
            $table->double('full')->nullable();
            $table->double('discounted')->nullable();
            $table->double('discounted_to_display')->nullable();
            $table->double('discounted_monthly')->nullable();
            $table->double('discounted_monthly_to_display')->nullable();
            $table->double('discounted_without_taxes')->nullable();
            $table->double('discounted_taxes')->nullable();
            $table->double('discounted_ssn')->nullable();
            $table->double('early_discount')->nullable();
            $table->double('pressure_discount')->nullable();
            $table->string('payment_frequency')->nullable();
            $table->integer('fee')->nullable();
            $table->string('limit')->nullable();
            $table->string('required_guarantees')->nullable();

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
        Schema::dropIfExists('quotation_data_prima_guarantee_prices');
    }
};
