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
        Schema::create('quotation_saves', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('request_id')->unsigned();
            $table->foreignId('quotation_id');
            $table->string('saved_quotation_id')->nullable();
            $table->foreignId('user_id');
            $table->string('link_end_point')->nullable();
            $table->boolean('can_be_paid')->default(0);
            $table->double('total_price');
                $table->json('full_request')->nullable();
            $table->json('full_response')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('save_quotations');
    }
};
