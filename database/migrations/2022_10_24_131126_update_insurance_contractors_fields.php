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
        Schema::table('insurnace_contractors', function (Blueprint $table) {
            $table->boolean('valid_driving_license')->default(true)->after('driving_license_year')->nullable()->change();
            $table->integer('km_in_one_year')->after('valid_driving_license')->nullable()->change();
            $table->integer('youngest_age')->after('km_in_one_year')->nullable()->change();
            $table->integer('vehicles_owned')->after('youngest_age')->nullable()->change();
            $table->dateTime('policy_effective_date')->after('vehicles_owned')->nullable()->nullable()->change();
            $table->boolean('other_drivers')->default(false)->after('policy_effective_date')->nullable()->change();
            $table->string('business_name')->after('other_drivers')->nullable()->change();
            $table->integer('vat_number')->after('business_name')->nullable()->change();
            $table->integer('children_under_17')->after('company_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('insurance_request_professions');
    }
};
