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
        Schema::create('insurnace_contractors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('request_id')->unsigned();
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
            $table->boolean('is_owner')->default(false);
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
        Schema::dropIfExists('insurnace_contractors');
    }
};