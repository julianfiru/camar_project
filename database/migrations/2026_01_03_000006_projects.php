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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('project_name')->unique();
            $table->string('project_type');
            $table->string('location');
            $table->decimal('price', 65, 0);
            $table->decimal('total_capacity_ton', 65, 0);
            $table->decimal('available_capacity_ton', 65, 0);
            $table->integer('duration_years');
            $table->string('status');
            $table->timestamp('created_at');

            $table->foreign('seller_id')->references('seller_id')->on('sellers');
        });
        Schema::create('mrv_reports', function (Blueprint $table) {
            $table->id('mrv_id');
            $table->unsignedBigInteger('project_id');
            $table->string('mrv_name');
            $table->date('reporting_period_start');
            $table->date('reporting_period_end');
            $table->string('document_url');
            $table->timestamp('submitted_at');

            $table->foreign('project_id')->references('project_id')->on('projects');
        });
        Schema::create('project_verifications', function (Blueprint $table) {
            $table->id('verification_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('auditor_id');
            $table->string('verified_emission_ton');
            $table->string('verification_report_url');
            $table->timestamp('verified_at');

            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->foreign('auditor_id')->references('auditor_id')->on('auditors');
        });
        Schema::create('project_stock_logs', function (Blueprint $table) {
            $table->id('stock_log_id');
            $table->unsignedBigInteger('project_id');
            $table->string('action_type');
            $table->unsignedBigInteger('related_order_id');
            $table->decimal('quantity_ton', 65, 0);
            $table->string('description');
            $table->timestamp('created_at');

            $table->foreign('project_id')->references('project_id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('mrv_reports');
        Schema::dropIfExists('project_verifications');
        //
    }
};
