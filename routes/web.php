<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Seller\Customer\CustomerSeller;
use App\Http\Controllers\Seller\Dashboard\DashboardSeller;
use App\Http\Controllers\Seller\Penjualan\PenjualanSeller;
use App\Http\Controllers\Seller\Performa\PerformaSeller;
use App\Http\Controllers\Seller\Profil\ProfilSeller;
use App\Http\Controllers\Seller\Proyek\ProyekSeller;

# MarketPlace
Route::get('/', function () {
    return view('MarketPlace.landing.landing');
})->name('home');
Route::get('/kalkulator', function () {
    return view('MarketPlace.calculator.calculator');
})->name('calculator');

Route::get('/proyek', function () {
    return view('MarketPlace.projects.projects');
})->name('projects');
Route::get('/edukasi', function () {
    return view('MarketPlace.edukasi.edukasi');
})->name('edukasi');

Route::get('/tentang', function () {
    return view('MarketPlace.tentang.tentang');
})->name('about');
# MarketPlace

# Authentication
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::get('/register/success', [AuthController::class, 'showRegisterSuccess'])->name('register.success');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
# Authentication

Route::middleware(['auth'])->group(function () {
    # SELLER #
        Route::middleware(['role:Seller'])->prefix('seller')->group(function () {
            Route::get('/dashboard', [DashboardSeller::class, 'index'])->name('seller.dashboard');
            Route::get('/penjualan', [PenjualanSeller::class, 'index'])->name('seller.penjualan');
            Route::get('/profil', [ProfilSeller::class, 'index'])->name('seller.profil');
            Route::get('/proyek', [ProyekSeller::class, 'index'])->name('seller.proyek');
            Route::get('/customer', [CustomerSeller::class, 'index'])->name('seller.customer');
            Route::get('/performa', [PerformaSeller::class, 'index'])->name('seller.performa');
        });
    # SELLER #

    # contoh lain: BUYER #
        Route::middleware(['auth', 'role:Buyer'])->prefix('buyer')->group(function () {
            Route::get('/dashboard', function () {
                return view('Buyer.content.dashboard.dashboard');
            })->name('buyer.dashboard');            
            Route::get('/profil', function () {
                return view('Buyer.content.profil.profil');
            })->name('buyer.profil');
            Route::get('/hitung', function () {
                return view('Buyer.content.emisi.hitung');
            })->name('buyer.hitung');
            Route::get('/catatan', function () {
                return view('Buyer.content.emisi.catatan');
            })->name('buyer.catatan');
            Route::get('/laporan', function () {
                return view('Buyer.content.laporan.laporan');
            })->name('buyer.laporan');
            Route::get('/sertifikat', function () {
                return view('Buyer.content.sertifikat.sertifikat');
            })->name('buyer.sertifikat');
            Route::get('/riwayat', function () {
                return view('Buyer.content.riwayat.riwayat');
            })->name('buyer.riwayat');
            Route::get('/keamanan', function () {
                return view('Buyer.content.pengaturan.keamanan');
            })->name('buyer.keamanan');
            Route::get('/pembayaran', function () {
                return 'Halaman Metode Pembayaran';
            })->name('buyer.pembayaran');
            Route::get('/notifikasi', function () {
                return view('Buyer.content.pengaturan.notifikasi');
            })->name('buyer.notifikasi');
            Route::get('/bantuan', function () {
                return view('Buyer.content.pengaturan.bantuan');
            })->name('buyer.bantuan');
            Route::get('/kebijakan', function () {
                return view('Buyer.content.pengaturan.kebijakan');
            })->name('buyer.kebijakan');
            Route::get('/hapusakun', function () {
                return view('Buyer.content.pengaturan.hapusakun');
            })->name('buyer.hapusakun');
        });
    # BUYER
});