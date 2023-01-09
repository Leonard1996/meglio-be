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
        Schema::table('insurance_request_vehicles', function (Blueprint $table) {
            $table->boolean('is_modified')->default(false)->after('tow_hook');
            $table->enum('parking',['private_box', 'garage', 'on_the_street'])->after('is_modified');
            $table->string('usage')->after('parking');
            $table->string('other_power_supply')->after('usage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance_request_vehicles', function (Blueprint $table) {
            //
        });
    }
};
