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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('gender')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('country_of_birth_code');
            $table->string('province_of_birth_code')->nullable();
            $table->string('commune_of_birth_code')->nullable();
            $table->boolean('born_abroad')->nullable();
            $table->string('residence_province_code')->nullable();
            $table->string('residence_commune_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->string('house_number')->nullable();
            $table->integer('civil_status_id')->nullable();
            $table->integer('education_level_id')->nullable();
            $table->integer('profession_id')->nullable();
            $table->integer('driving_license_year')->nullable();
            $table->boolean('valid_driving_license')->nullable();
            $table->integer('km_in_one_year')->nullable();
            $table->integer('youngest_age')->nullable();
            $table->integer('vehicles_owned')->nullable();
            $table->dateTime('policy_effective_date')->nullable();
            $table->boolean('other_drivers')->nullable();
            $table->string('business_name')->nullable();
            $table->integer('vat_number')->nullable();
            $table->enum('company_type',['Srl', 'Sas', 'Snc', 'Spa', 'Scarl', 'Srls', 'SS', 'Sapa'])->nullable();
            $table->integer('children_under_17')->nullable();
            $table->boolean('is_owner')->default(true);
            $table->boolean('is_driver')->default(true);
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
        Schema::dropIfExists('customers');
    }
};
