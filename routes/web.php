<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\MarketPlace\Home\Home;
use App\Http\Controllers\Seller\Customer\CustomerSeller;
use App\Http\Controllers\Seller\Dashboard\DashboardSeller;
use App\Http\Controllers\Seller\Penjualan\PenjualanSeller;
use App\Http\Controllers\Seller\Performa\PerformaSeller;
use App\Http\Controllers\Seller\Profil\ProfilSeller;
use App\Http\Controllers\Seller\Proyek\ProyekSeller;

# MarketPlace
    Route::get('/', [Home::class, 'index'])->name('home');
    Route::get('/kalkulator', function () {
        return view('MarketPlace.calculator.calculator');
    })->name('calculator');

    Route::get('/proyek', function () {
        return view('MarketPlace.projects.projects');
    })->name('projects');
    Route::get('/marketplace/product/{id}', [ProdukDetail::class, 'detail'])->name('marketplace.product_detail');
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
    Route::get('/account/status', [AuthController::class, 'showAccountStatus'])->name('account.status');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
# Authentication

Route::middleware(['auth'])->group(function () {
    # SELLER #
        Route::middleware(['role:Seller'])->prefix('seller')->group(function () {
            Route::get('/project/detail/{id}', [ProyekSeller::class, 'getDetail'])->name('seller.project.detail');
            Route::get('/project/update/{id}', [ProyekSeller::class, 'getUpdate'])->name('seller.project.ubah');
            Route::post('/project/uploadDocument', [ProyekSeller::class, 'UploadDocument'])->name('seller.upload.documentProject');
            Route::post('/profil/uploadDocument', [ProfilSeller::class, 'UploadDocument'])->name('seller.upload.documentSeller');
            Route::post('/project/updating', [ProyekSeller::class, 'UpdateProject'])->name('seller.project.updating');
            Route::get('/dashboard', [DashboardSeller::class, 'index'])->name('seller.dashboard');
            Route::get('/penjualan', [PenjualanSeller::class, 'index'])->name('seller.penjualan');
            Route::get('/profil', [ProfilSeller::class, 'index'])->name('seller.profil');
            Route::get('/proyek', [ProyekSeller::class, 'index'])->name('seller.proyek');
            Route::get('/customer', [CustomerSeller::class, 'index'])->name('seller.customer');
            Route::get('/performa', [PerformaSeller::class, 'index'])->name('seller.performa');
        });
    # SELLER #

    # BUYER #
        Route::middleware(['role:Buyer'])->prefix('buyer')->group(function () {
            Route::get('/dashboard', function () {
                return view('Buyer.content.dashboard.dashboard');
            })->name('buyer.dashboard');
            Route::get('/profil', function () {
                return view('Buyer.content.profil.profil');
            })->name('buyer.profil');
            Route::get('/hitung', function () {
                return view('Buyer.content.emisi.hitung');
            })->name('buyer.emisi.hitung');
            Route::get('/catatan', function () {
                return view('Buyer.content.emisi.catatan');
            })->name('buyer.emisi.catatan');
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
            })->name('buyer.pengaturan.keamanan');
            Route::get('/pembayaran', function () {
                return 'Halaman Metode Pembayaran';
            })->name('buyer.pembayaran');
            Route::get('/notifikasi', function () {
                return view('Buyer.content.pengaturan.notifikasi');
            })->name('buyer.pengaturan.notifikasi');
            Route::get('/bantuan', function () {
                return view('Buyer.content.pengaturan.bantuan');
            })->name('buyer.pengaturan.bantuan');
            Route::get('/kebijakan', function () {
                return view('Buyer.content.pengaturan.kebijakan');
            })->name('buyer.pengaturan.kebijakan');
            Route::get('/hapusakun', function () {
                return view('Buyer.content.pengaturan.hapusakun');
            })->name('buyer.pengaturan.hapusakun');
        });
    # BUYER #

    # ADMIN #
        Route::middleware(['role:Admin'])->prefix('admin')->group(function () {
            Route::get('/dashboard', function () {
                return view('Admin.Content.AdminDashboard.admindashboard');
            })->name('admin.dashboard');
            Route::get('/manajemen-akun', function () {
                return view('Admin.Content.ManajemenAkun.manajemenakun');
            })->name('admin.manajemen.akun');
            Route::get('/proyek', function () {
                return view('Admin.Content.Proyek.proyek');
            })->name('admin.proyek');
            Route::get('/sertifikat', function () {
                return view('Admin.Content.Sertifikat.sertifikat');
            })->name('admin.sertifikat');
            Route::get('/audit-log', function () {
                return view('Admin.Content.AuditLog.auditlog');
            })->name('admin.audit.log');
            Route::get('/pengaturan-platform', function () {
                return view('Admin.Content.PengaturanPlatform.pengaturanplatform');
            })->name('admin.pengaturan.platform');
        });
    # ADMIN #

    # AUDITOR #
        Route::middleware(['role:Auditor'])->prefix('auditor')->group(function () {
            Route::get('/dashboard', function () {
                return view('Auditor.content.Dashboard.dashboard');
            })->name('auditor.dashboard');
            Route::get('/menunggu-verifikasi', function () {
                return view('Auditor.content.Menunggu-verifikasi.menunggu-verifikasi');
            })->name('auditor.menunggu-verifikasi');
            Route::get('/verifikasi-proyek', function () {
                return view('Auditor.content.Verifikasi-proyek.verifikasi-proyek');
            })->name('auditor.verifikasi-proyek');
            Route::get('/upload-laporan', function () {
                return view('Auditor.content.Upload-laporan.upload-laporan');
            })->name('auditor.upload-laporan');
            Route::get('/arsip-verifikasi', function () {
                return view('Auditor.content.Arsip-verifikasi.arsip-verifikasi');
            })->name('auditor.arsip-verifikasi');
            Route::get('/pengaturan', function () {
                return view('Auditor.content.Pengaturan.pengaturan');
            })->name('auditor.pengaturan');
        });
    # AUDITOR #
});