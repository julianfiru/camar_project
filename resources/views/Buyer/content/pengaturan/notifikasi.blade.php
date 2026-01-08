@extends('Buyer.layout.app')

@section('title', 'Notifikasi & Bahasa - CAMAR')

@section('page-title', 'Notifikasi & Bahasa')
@section('page-subtitle', 'Kelola Notifikasi & Bahasa carbon offset Anda')

@section('Buyer.content')
<div class="container-fluid py-4">
    
    <!-- SECTION 1: BAHASA TAMPILAN -->
    <div class="nb-card card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="nb-card-title card-title h4 fw-bold mb-3">
                <i class="bi bi-globe me-2"></i>Bahasa Tampilan
            </h2>
            <p class="text-muted mb-4">
                Pilih bahasa yang akan digunakan pada seluruh platform CAMAR
            </p>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Radio Button Bahasa Indonesia -->
                    <div class="nb-language-option mb-3">
                        <input type="radio" class="btn-check" name="nb-language" id="nb-lang-id" value="id" checked>
                        <label class="nb-btn-outline btn btn-outline-primary w-100 text-start p-3" for="nb-lang-id">
                            <div class="d-flex align-items-center">
                                <span class="fs-1 me-3">🇮🇩</span>
                                <div>
                                    <div class="fw-bold">Bahasa Indonesia</div>
                                    <small class="text-muted">Semua konten ditampilkan dalam Bahasa Indonesia</small>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Radio Button English -->
                    <div class="nb-language-option mb-3">
                        <input type="radio" class="btn-check" name="nb-language" id="nb-lang-en" value="en">
                        <label class="nb-btn-outline btn btn-outline-primary w-100 text-start p-3" for="nb-lang-en">
                            <div class="d-flex align-items-center">
                                <span class="fs-1 me-3">🇬🇧</span>
                                <div>
                                    <div class="fw-bold">English</div>
                                    <small class="text-muted">All content displayed in English</small>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-4">
                        <button type="button" class="nb-save-btn btn btn-primary btn-lg" id="nb-saveBahasaBtn">
                            <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: NOTIFIKASI -->
    <div class="nb-card card border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="nb-card-title card-title h4 fw-bold mb-3">
                <i class="bi bi-bell me-2"></i>Notifikasi
            </h2>
            <p class="text-muted mb-4">
                Kelola notifikasi yang Anda terima di aplikasi
            </p>

            <!-- 1. Notifikasi Transaksi -->
            <div class="nb-notification-item">
                <div class="nb-notification-info">
                    <h5 class="nb-notification-title">
                        <i class="bi bi-credit-card-2-front nb-icon-primary me-2"></i>
                        1. Notifikasi Transaksi
                    </h5>
                    <p class="nb-notification-desc mb-0">
                        Pemberitahuan saat ada transaksi baru, perubahan status pembelian offset, atau pembayaran
                    </p>
                </div>
                <div class="nb-notification-toggle">
                    <div class="nb-form-switch">
                        <input class="nb-form-check-input" type="checkbox" id="nb-notif-transaksi" checked>
                        <label for="nb-notif-transaksi"></label>
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <!-- 2. Notifikasi Laporan Proyek -->
            <div class="nb-notification-item">
                <div class="nb-notification-info">
                    <h5 class="nb-notification-title">
                        <i class="bi bi-file-earmark-text nb-icon-success me-2"></i>
                        2. Notifikasi Laporan Proyek
                    </h5>
                    <p class="nb-notification-desc mb-0">
                        Pemberitahuan saat ada laporan progress baru, update realisasi proyek, atau dokumen proyek tersedia
                    </p>
                </div>
                <div class="nb-notification-toggle">
                    <div class="nb-form-switch">
                        <input class="nb-form-check-input" type="checkbox" id="nb-notif-laporan" checked>
                        <label for="nb-notif-laporan"></label>
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <!-- 3. Notifikasi Sertifikat -->
            <div class="nb-notification-item">
                <div class="nb-notification-info">
                    <h5 class="nb-notification-title">
                        <i class="bi bi-award nb-icon-warning me-2"></i>
                        3. Notifikasi Sertifikat
                    </h5>
                    <p class="nb-notification-desc mb-0">
                        Pemberitahuan saat sertifikat carbon offset telah diterbitkan dan siap diunduh
                    </p>
                </div>
                <div class="nb-notification-toggle">
                    <div class="nb-form-switch">
                        <input class="nb-form-check-input" type="checkbox" id="nb-notif-sertifikat" checked>
                        <label for="nb-notif-sertifikat"></label>
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <!-- 4. Notifikasi Pembaruan Sistem -->
            <div class="nb-notification-item">
                <div class="nb-notification-info">
                    <h5 class="nb-notification-title">
                        <i class="bi bi-gear nb-icon-info me-2"></i>
                        4. Notifikasi Pembaruan Sistem
                    </h5>
                    <p class="nb-notification-desc mb-0">
                        Pemberitahuan tentang fitur baru, pembaruan sistem, atau pengumuman penting dari platform
                    </p>
                </div>
                <div class="nb-notification-toggle">
                    <div class="nb-form-switch">
                        <input class="nb-form-check-input" type="checkbox" id="nb-notif-sistem" checked>
                        <label for="nb-notif-sistem"></label>
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <!-- 5. Notifikasi Email -->
            <div class="nb-notification-item">
                <div class="nb-notification-info">
                    <h5 class="nb-notification-title">
                        <i class="bi bi-envelope nb-icon-danger me-2"></i>
                        5. Notifikasi Email
                    </h5>
                    <p class="nb-notification-desc mb-0">
                        Terima salinan notifikasi melalui email untuk backup dan arsip
                    </p>
                </div>
                <div class="nb-notification-toggle">
                    <div class="nb-form-switch">
                        <input class="nb-form-check-input" type="checkbox" id="nb-notif-email">
                        <label for="nb-notif-email"></label>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Toast untuk notifikasi -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="nb-notifToast" class="nb-toast toast align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="nb-toast-body toast-body" id="nb-toastMessage">
                <!-- Message akan diisi via JavaScript -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endsection