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
        Schema::create('offset_orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('project_id');
            $table->decimal('offset_amount_ton', 65, 0);
            $table->string('order_status');
            $table->timestamp('created_at');
            
            $table->foreign('buyer_id')->references('buyer_id')->on('buyers');
            $table->foreign('project_id')->references('project_id')->on('projects');
        });
        Schema::create('buyer_offset_targets', function (Blueprint $table) {
            $table->id('target_id');
            $table->unsignedBigInteger('buyer_id');
            $table->integer('year');
            $table->decimal('target_percentage', 65, 0);
            
            $table->foreign('buyer_id')->references('buyer_id')->on('buyers');
        });
        Schema::create('offset_relizations', function (Blueprint $table) {
            $table->id('relization_id');
            $table->unsignedBigInteger('verification_id');
            $table->unsignedBigInteger('order_id');
            $table->decimal('realized_ton', 65, 0);
            $table->timestamp('created_at');
            
            $table->foreign('verification_id')->references('verification_id')->on('project_verifications');
            $table->foreign('order_id')->references('order_id')->on('offset_orders');
        });
        Schema::create('offset_certificates', function (Blueprint $table) {
            $table->id('certificate_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('buyer_id');
            $table->decimal('offset_amount_ton', 65, 0);
            $table->string('certificate_number');
            $table->timestamp('issued_at');
            
            $table->foreign('order_id')->references('order_id')->on('offset_orders');
            $table->foreign('project_id')->references('project_id')->on('projects');
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
