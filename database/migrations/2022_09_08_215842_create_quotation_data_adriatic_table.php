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
        Schema::create('quotation_data_adriatic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id');
            $table->string('cu')->nullable();
            $table->boolean('bersani')->default(false);
            $table->string('insured_sum_id')->nullable();
            $table->boolean('loading_rivalsa_rinuncia')->default(false);
            $table->boolean('loading_taxi')->default(false);
            $table->boolean('loading_rent_a_car')->default(false);
            $table->boolean('loading_bonus_protection')->default(false);
            $table->double('loading_risk_percent')->nullable();
            $table->double('loading_discount_percent')->nullable();
            $table->double('loading_black_box_percent')->nullable();
            $table->boolean('road_assistance')->default(false);
            $table->string('road_assistance_type')->nullable();
            $table->boolean('fire')->default(false);
            $table->double('fire_franchise')->nullable();
            $table->boolean('fire_total_damage')->default(false);
            $table->boolean('theft')->default(false);
            $table->double('theft_franchise')->nullable();
            $table->boolean('theft_total_damage')->default(false);
            $table->boolean('social_political_events')->default(false);
            $table->double('social_political_events_franchise')->nullable();
            $table->boolean('natural_events')->default(false);
            $table->double('natural_events_franchise')->nullable();
            $table->double('premium_amount')->nullable();
            $table->double('taxes_amount')->nullable();
            $table->double('total_amount')->nullable();
            $table->double('road_assistance_premium_amount')->nullable();
            $table->double('road_assistance_taxes_amount')->nullable();
            $table->double('road_assistance_total_amount')->nullable();
            $table->double('fire_premium_amount')->nullable();
            $table->double('fire_taxes_amount')->nullable();
            $table->double('fire_total_amount')->nullable();
            $table->double('theft_premium_amount')->nullable();
            $table->double('theft_taxes_amount')->nullable();
            $table->double('theft_total_amount')->nullable();
            $table->double('social_political_events_premium_amount')->nullable();
            $table->double('social_political_events_taxes_amount')->nullable();
            $table->double('social_political_events_total_amount')->nullable();
            $table->double('natural_events_premium_amount')->nullable();
            $table->double('natural_events_taxes_amount')->nullable();
            $table->double('natural_events_total_amount')->nullable();
            $table->double('total_premium_amount')->nullable();
            $table->double('total_taxes_amount')->nullable();
            $table->double('total_service_amount')->nullable();
            $table->double('amount')->nullable();
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
