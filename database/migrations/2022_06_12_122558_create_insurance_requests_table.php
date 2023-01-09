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
        Schema::create('insurance_requests', function (Blueprint $table) {
            // request INFO
            $table->id();
            $table->string('request_token')->unique();
            $table->string('product_id')->nullable(false);
            $table->string('ip')->nullable();
            $table->string('source')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('broker_company_id')->nullable();
            $table->bigInteger('broker_agent_id')->nullable();
            // CONTRACTOR DATA and OWNER DATA stored in insurnace_contractors
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
        Schema::dropIfExists('insurance_requests');
    }
};
