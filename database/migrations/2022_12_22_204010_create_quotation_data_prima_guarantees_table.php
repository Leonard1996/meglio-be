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
        Schema::create('quotation_data_prima_guarantees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_data_prima_id');
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_last_year_guarantee_mandatory')->default(0);
            $table->boolean('default')->default(0);
            $table->boolean('rca_related')->default(0);
            $table->dateTime('early_discount_expiration_date')->nullable();
            $table->string('contentsquare_code')->nullable();
            $table->string('default_discount_code')->nullable();
            $table->string('limits_name')->nullable();
            $table->string('limits_slug')->nullable();
            $table->double('limits_limit1')->nullable();
            $table->double('limits_limit2')->nullable();
            $table->string('tooltip_slug')->nullable();
            $table->string('tooltip_text')->nullable();
            $table->string('details_slug')->nullable();
            $table->string('details_text')->nullable();

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
        Schema::dropIfExists('quotation_data_prima_guarantees');
    }
};
