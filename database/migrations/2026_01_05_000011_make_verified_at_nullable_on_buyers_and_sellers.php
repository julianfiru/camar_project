<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Make verified_at nullable for buyers and sellers so new accounts can be pending verification
        DB::statement("ALTER TABLE buyers MODIFY COLUMN verified_at TIMESTAMP NULL DEFAULT NULL");
        DB::statement("ALTER TABLE sellers MODIFY COLUMN verified_at TIMESTAMP NULL DEFAULT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert verified_at to NOT NULL without default
        DB::statement("ALTER TABLE buyers MODIFY COLUMN verified_at TIMESTAMP NOT NULL");
        DB::statement("ALTER TABLE sellers MODIFY COLUMN verified_at TIMESTAMP NOT NULL");
    }
};
