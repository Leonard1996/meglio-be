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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_type_id');
            $table->boolean('signable_document')->default(false);
            $table->string('unsigned_document_path');
            $table->string('signed_document_path')->nullable();
            $table->string('doc_request_id')->nullable();
            $table->string('sign_request_id')->nullable();
            $table->boolean('upload_in_cloud')->default(0);
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
        Schema::dropIfExists('documents');
    }
};
