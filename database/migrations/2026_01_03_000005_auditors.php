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
        Schema::create('auditors', function (Blueprint $table) {
            $table->id('auditor_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('position');
            
            $table->foreign('user_id')->references('user_id')->on('users');
        });
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('action');
            $table->string('entity_type');
            $table->integer('entity_id');
            $table->timestamp('created_at');
            
            $table->foreign('admin_id')->references('admin_id')->on('admins');
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
