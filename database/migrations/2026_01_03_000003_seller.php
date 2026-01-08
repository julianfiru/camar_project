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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id('seller_id');
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
            $table->timestamp('verified_at')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
        });
        Schema::create('seller_badges', function (Blueprint $table) {
            $table->id('badge_id');
            $table->unsignedBigInteger('seller_id');
            $table->decimal('total_relized_ton', 65, 0);
            $table->timestamp('assigned_at');

            $table->foreign('seller_id')->references('seller_id')->on('sellers');
        });
        Schema::create('seller_bankings', function (Blueprint $table) {
            $table->id('bank_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('bank_branch');

            $table->foreign('seller_id')->references('seller_id')->on('sellers');
        });
        Schema::create('seller_documentations', function (Blueprint $table) {
            $table->id('document_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('document_name');
            $table->string('document_type');
            $table->decimal('size', 65, 0);
            $table->integer('document_status');
            $table->string('document_url');
            $table->timestamp('submitted_at');

            $table->foreign('seller_id')->references('seller_id')->on('sellers');
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
