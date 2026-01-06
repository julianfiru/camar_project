<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes - CAMAR Platform
|--------------------------------------------------------------------------
|
| Main routes for CAMAR Carbon Offset Platform
|
*/

// ========================================
// PUBLIC PAGES
// ========================================

// Landing Page (Homepage)
Route::get('/', function () {
    return view('main_page.landing.landing');
})->name('home');

// Calculator Page - Kalkulator Emisi Karbon
Route::get('/kalkulator', function () {
    return view('main_page.calculator.calculator');
})->name('calculator');

// Projects Page - Marketplace Carbon Offset
Route::get('/proyek', function () {
    return view('main_page.projects.projects');
})->name('projects');

// Education Page - Edukasi Carbon Offset
Route::get('/edukasi', function () {
    return view('main_page.edukasi.edukasi');
})->name('edukasi');

// About Page - Tentang Kami
Route::get('/tentang', function () {
    return view('main_page.tentang.tentang');
})->name('about');

// ========================================
// AUTHENTICATION PAGES
// ========================================

// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Register Page
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Register Success Page (after submitting registration)
Route::get('/register/success', [AuthController::class, 'showRegisterSuccess'])->name('register.success');

// Account Status Page (untuk akun yang belum aktif/verifikasi)
Route::get('/account/status', [AuthController::class, 'showAccountStatus'])
    ->name('account.status');

// ========================================
// AUTHENTICATION ACTIONS (POST)
// ========================================

// Login Process
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Register Process
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ========================================
// FUTURE ROUTES (TODO)
// ========================================

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::get('/profile', 'ProfileController@index')->name('profile');
//     Route::get('/transactions', 'TransactionController@index')->name('transactions');
// });

Route::get('/product/mangrove', function() {
    return view('main_page.product-detail.product-detail');
})->name('product.mangrove');