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
        Schema::create('insurance_request_professions', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('request_id')->unsigned();
            $table->integer('profession');
            $table->string('profession_code');
            $table->string('profession_desc');
            $table->string('billed');
            $table->string('billed_maximum');
            $table->integer('retroactivity');
            $table->enum('high_risk', ['no','si'])->default('no');
            $table->enum('ext_reviewer', ['no','si'])->default('no');
            $table->string('extensions');
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
        Schema::dropIfExists('insurance_request_professions');
    }
};
