<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Seller\Customer\CustomerSeller;
use App\Http\Controllers\Seller\Dashboard\DashboardSeller;
use App\Http\Controllers\Seller\Penjualan\PenjualanSeller;
use App\Http\Controllers\Seller\Performa\PerformaSeller;
use App\Http\Controllers\Seller\Profil\ProfilSeller;
use App\Http\Controllers\Seller\Proyek\ProyekSeller;

Route::redirect('/', '/Login');
Route::redirect('/login', '/Login');

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
    Route::get('/Login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::get('/register/success', [AuthController::class, 'showRegisterSuccess'])->name('register.success');
    Route::post('/Login', [AuthController::class, 'login'])->name('login.process');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::post('/Logout', [AuthController::class, 'logout'])->name('logout');
# Authentication

Route::middleware(['auth'])->group(function () {
    # SELLER #
        Route::middleware(['auth', 'role:Seller'])->group(function () {
            Route::redirect('/dashboard', '/Dashboard');
            Route::redirect('/proyek', '/Proyek');
            Route::redirect('/penjualan', '/Penjualan');
            Route::redirect('/performa', '/Performa');
            Route::get('/Dashboard', [DashboardSeller::class, 'index'])->name('seller.dashboard');
            Route::get('/Penjualan', [PenjualanSeller::class, 'index']);
            Route::get('/Profil', [ProfilSeller::class, 'index']);
            Route::get('/Proyek', [ProyekSeller::class, 'index']);
            Route::get('/Customer', [CustomerSeller::class, 'index']);
            Route::get('/Performa', [PerformaSeller::class, 'index']);
        });
    # SELLER #

    # contoh lain: BUYER #
        // Route::middleware(['auth', 'role:Buyer'])->group(function () {
        //     Route::redirect('/dashboard', '/Dashboard');
        //     Route::redirect('/profil', '/Profil');
        //     Route::redirect('/laporan', '/Laporan');
        //     Route::redirect('/sertifikat', '/Sertifikat');
        //     Route::get('/Dashboard', [DashboardBuyer::class, 'index']);
        //     Route::get('/Profil', [ProfilBuyer::class, 'index']);
        //     Route::get('/Laporan', [LaporandBuyer::class, 'index']);
        //     Route::get('/Sertifikat', [SertifikatBuyer::class, 'index']);
        // });
    # BUYER
});