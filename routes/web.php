<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login', function () {
    return view('main_page.login.login');
})->name('login');

// Register Page
Route::get('/register', function () {
    return view('main_page.register.register');
})->name('register');

// ========================================
// AUTHENTICATION ACTIONS (POST)
// ========================================

// Login Process
Route::post('/login', function (Illuminate\Http\Request $request) {
    // TODO: Implement login authentication logic
    // Validate credentials
    // Create session
    // Redirect to dashboard
    
    // Temporary: Just redirect to home
    return redirect()->route('home')->with('success', 'Login berhasil!');
})->name('login.process');

// Register Process
Route::post('/register', function (Illuminate\Http\Request $request) {
    // TODO: Implement registration logic
    // Validate form data
    // Create user account
    // Upload documents
    // Send verification email
    
    // Temporary: Just redirect to home
    return redirect()->route('home')->with('success', 'Registrasi berhasil! Akun Anda akan diverifikasi dalam 1-2 hari kerja.');
})->name('register.process');

// Logout
Route::post('/logout', function () {
    // TODO: Implement logout logic
    // Destroy session
    // Clear cookies
    
    // Temporary: Just redirect to home
    return redirect()->route('home')->with('info', 'Anda telah logout.');
})->name('logout');

// ========================================
// FUTURE ROUTES (TODO)
// ========================================

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::get('/profile', 'ProfileController@index')->name('profile');
//     Route::get('/transactions', 'TransactionController@index')->name('transactions');
// });