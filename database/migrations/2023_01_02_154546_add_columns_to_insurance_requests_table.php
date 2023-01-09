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
        Schema::table('insurance_requests', function (Blueprint $table) {
            //
            $table->boolean('other_drivers')->after('customer_id')->nullable();
            $table->dateTime('policy_effective_date')->after('customer_id')->nullable();
            $table->integer('family_youngest_driver_age')->after('customer_id')->nullable();
            $table->integer('km_in_one_year')->after('customer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance_requests', function (Blueprint $table) {
            //
        });
    }
};
