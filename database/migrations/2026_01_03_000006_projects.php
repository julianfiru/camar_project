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
        Schema::create('project_categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('category_name')->unique();
        });
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('sku')->unique();
            $table->string('project_name')->unique();
            $table->unsignedBigInteger('category_id');
            $table->string('location');
            $table->decimal('price', 65, 0);
            $table->decimal('total_capacity_ton', 65, 0);
            $table->decimal('available_capacity_ton', 65, 0);
            $table->integer('duration_years');
            $table->integer('status');
            $table->string('photo_url');
            $table->string('desc');
            $table->timestamp('created_at');

            $table->foreign('seller_id')->references('seller_id')->on('sellers');
            $table->foreign('category_id')->references('category_id')->on('project_categories');
        });
        Schema::create('project_subimg', function (Blueprint $table) {
            $table->id('subimg_id');
            $table->unsignedBigInteger('project_id');
            $table->string('subimg_url');

            $table->foreign('project_id')->references('project_id')->on('projects');
        });
        Schema::create('project_documentations', function (Blueprint $table) {
            $table->id('document_id');
            $table->unsignedBigInteger('project_id');
            $table->string('document_name');
            $table->integer('status');
            $table->decimal('size', 65, 0);
            $table->string('document_url');
            $table->timestamp('submitted_at');

            $table->foreign('project_id')->references('project_id')->on('projects');
        });
        Schema::create('project_view_logs', function (Blueprint $table) {
            $table->id('view_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('created_at');
            
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->foreign('user_id')->references('user_id')->on('users');
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
