<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id('buyer_id');
            $table->unsignedBigInteger('user_id');
            $table->string('company_name');
            $table->string('country');
            $table->string('nib');
            $table->string('npwp');
            $table->string('website');
            $table->string('phone_number');
            $table->string('bio');
            $table->string('desc');
            $table->text('address');
            $table->timestamp('verified_at');
            
            $table->foreign('user_id')->references('user_id')->on('users');
        });
        Schema::create('buyer_documentations', function (Blueprint $table) {
            $table->id('document_id');
            $table->unsignedBigInteger('buyer_id');
            $table->string('document_name');
            $table->string('document_type');
            $table->decimal('size', 65, 0);
            $table->integer('document_status');
            $table->string('document_url');

            $table->foreign('buyer_id')->references('buyer_id')->on('buyers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
