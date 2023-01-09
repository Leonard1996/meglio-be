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
        Schema::create('insurance_request_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('request_id')->unsigned();
            $table->foreignId('user_id');
            $table->foreignId('document_id');

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
        //
    }
};
