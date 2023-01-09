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
            $table->boolean('valid_driving_license')->default(true)->after('driving_license_year');
            $table->integer('km_in_one_year')->after('valid_driving_license');
            $table->integer('youngest_age')->after('km_in_one_year');
            $table->integer('vehicles_owned')->after('youngest_age');
            $table->dateTime('policy_effective_date')->after('vehicles_owned')->nullable();
            $table->boolean('other_drivers')->default(false)->after('policy_effective_date');
            $table->string('business_name')->after('other_drivers');
            $table->integer('vat_number')->after('business_name');
            $table->enum('company_type',['Srl', 'Sas', 'Snc', 'Spa', 'Scarl', 'Srls', 'SS', 'Sapa'])->after('vat_number');
            $table->integer('children_under_17')->after('company_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurnace_contractors', function (Blueprint $table) {
            //
        });
    }
};
