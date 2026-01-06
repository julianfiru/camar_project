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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('email')->unique();
            $table->string('password_hash');
            $table->string('role');
            // Status akun menggunakan kode integer, contoh:
            // 0 = Dibatalkan / Ditolak
            // 1 = Menunggu verifikasi admin
            // 2 = Terverifikasi (menunggu aktivasi akhir)
            // 3 = Aktif
            $table->unsignedTinyInteger('status')->default(1);
            $table->rememberToken();
            // Gunakan default waktu saat ini untuk created_at dan izinkan last_login null
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('last_login')->nullable();
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
