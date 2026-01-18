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
            $table->integer('order_status');
            $table->timestamp('created_at');
            
            $table->foreign('buyer_id')->references('buyer_id')->on('buyers');
            $table->foreign('project_id')->references('project_id')->on('projects');
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
