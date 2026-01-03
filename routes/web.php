<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing Page / Home
Route::get('/', function () {
    return view('landing');
})->name('home');

// About Page
Route::get('/tentang', function() {
    return view('tentang');
})->name('about');

// Calculator Page
Route::get('/kalkulator', function () {
    return view('calculator');
})->name('calculator');

// Projects Page
Route::get('/proyek', function () {
    return view('projects');
})->name('projects');

// Edukasi Page
Route::get('/edukasi', function () {
    return view('edukasi');
})->name('edukasi');

// Contact Page
Route::get('/kontak', function () {
    return view('contact');
})->name('contact');

// Login Page (Temporarily disabled - redirect to home)
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');