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
        Schema::create('emission_calculations', function (Blueprint $table) {
            $table->id('calculation_id');
            $table->unsignedBigInteger('buyer_id');
            $table->integer('year');
            $table->decimal('total_emission_ton', 65, 0);
            $table->string('methodology');
            $table->timestamp('created_at');

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
