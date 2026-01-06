@extends('Buyer.layout.app')

@section('title', 'Ajukan Penghapusan Akun - CAMAR')

@section('page-title', 'Ajukan Penghapusan Akun')
@section('page-subtitle', 'Ajukan Penghapusan Akun carbon offset Anda')

@section('Buyer.content')
<div class="container-fluid py-4">

    <!-- INFORMASI PENTING -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h3 class="section-title">
                <i class="bi bi-info-circle text-warning me-2"></i>Informasi Penting
            </h3>
            
            <div class="alert alert-warning mb-3">
                <h6 class="alert-heading fw-bold mb-2">
                    <i class="bi bi-shield-exclamation me-2"></i>Konsekuensi Penghapusan Akun
                </h6>
                <p class="mb-2">Setelah akun dihapus, hal-hal berikut akan terjadi:</p>
                <ul class="mb-0">
                    <li>Anda tidak dapat login ke platform CAMAR</li>
                    <li>Semua akses ke dashboard dan fitur akan dinonaktifkan</li>
                    <li>Notifikasi dan komunikasi platform akan dihentikan</li>
                    <li>Data akun akan dihapus sesuai kebijakan retensi data</li>
                </ul>
            </div>

            <div class="alert alert-info mb-0">
                <h6 class="alert-heading fw-bold mb-2">
                    <i class="bi bi-database-fill-lock me-2"></i>Data yang Tetap Disimpan
                </h6>
                <p class="mb-2">Untuk keperluan legal dan compliance, data berikut akan tetap disimpan:</p>
                <ul class="mb-0">
                    <li><strong>Riwayat transaksi</strong> pembelian carbon offset</li>
                    <li><strong>Sertifikat</strong> yang telah diterbitkan</li>
                    <li><strong>Laporan</strong> perhitungan emisi dan realisasi proyek</li>
                    <li><strong>Data finansial</strong> untuk keperluan audit dan perpajakan</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- RINGKASAN AKUN -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h3 class="section-title">
                <i class="bi bi-person-badge text-primary me-2"></i>Ringkasan Akun
            </h3>
            
            <div class="account-summary">
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="summary-item">
                            <div class="summary-label">Status Akun</div>
                            <div class="summary-value">
                                <span class="badge bg-success">Aktif</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="summary-item">
                            <div class="summary-label">Jumlah Transaksi</div>
                            <div class="summary-value text-primary fw-bold">12 transaksi</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="summary-item">
                            <div class="summary-label">Offset Direalisasi</div>
                            <div class="summary-value text-success fw-bold">1.250 ton CO₂e</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="summary-item">
                            <div class="summary-label">Sertifikat Aktif</div>
                            <div class="summary-value text-warning fw-bold">5 sertifikat</div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-secondary mt-4 mb-0">
                    <i class="bi bi-calendar-event me-2"></i>
                    <strong>Tanggal Bergabung:</strong> 12 Januari 2024
                </div>
            </div>
        </div>
    </div>

    <!-- ACTION BUTTONS -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <button type="button" class="btn btn-danger" id="btnStartDelete">
                <i class="bi bi-trash3 me-2"></i>Hapus Akun
            </button>
        </div>
    </div>

</div>

<!-- Multi-Step Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="modal-title mb-0" id="deleteAccountModalLabel">
                            <i class="bi bi-trash3 me-2"></i>Proses Penghapusan Akun
                        </h5>
                        <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <!-- Progress Steps -->
                    <div class="steps-progress mt-4">
                        <div class="step active" data-step="1">
                            <div class="step-number">1</div>
                            <div class="step-label">Identitas</div>
                        </div>
                        <div class="step-line"></div>
                        <div class="step" data-step="2">
                            <div class="step-number">2</div>
                            <div class="step-label">Alasan</div>
                        </div>
                        <div class="step-line"></div>
                        <div class="step" data-step="3">
                            <div class="step-number">3</div>
                            <div class="step-label">Persetujuan</div>
                        </div>
                        <div class="step-line"></div>
                        <div class="step" data-step="4">
                            <div class="step-number">4</div>
                            <div class="step-label">Konfirmasi</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-body">
                <!-- STEP 1: KONFIRMASI IDENTITAS -->
                <div class="step-content active" id="step1">
                    <h5 class="mb-3">
                        <i class="bi bi-shield-lock text-primary me-2"></i>Konfirmasi Identitas
                    </h5>
                    <p class="text-muted mb-4">Untuk keamanan, silakan konfirmasi identitas Anda terlebih dahulu</p>

                    <div class="verification-options">
                        <div class="form-check verification-option mb-3">
                            <input class="form-check-input" type="radio" name="konfirmasiIdentitas" id="verify1" value="password" checked>
                            <label class="form-check-label" for="verify1">
                                <i class="bi bi-key-fill text-primary me-2"></i>
                                <span class="fw-bold">Masukkan password akun</span>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check verification-option mb-3">
                            <input class="form-check-input" type="radio" name="konfirmasiIdentitas" id="verify2" value="otp">
                            <label class="form-check-label" for="verify2">
                                <i class="bi bi-envelope-fill text-primary me-2"></i>
                                <span class="fw-bold">OTP ke email terdaftar</span>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>
                    </div>

                    <div id="passwordVerification" class="verification-container">
                        <label for="passwordConfirm" class="form-label fw-bold">Password Akun <span class="text-danger">*</span></label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="passwordConfirm" 
                            placeholder="Masukkan password Anda"
                        >
                        <div class="form-text">Masukkan password untuk verifikasi</div>
                    </div>

                    <div id="otpVerification" class="verification-container" style="display: none;">
                        <button type="button" class="btn btn-outline-primary mb-3" id="sendOtpBtn">
                            <i class="bi bi-send me-2"></i>Kirim Kode OTP
                        </button>
                        <label for="otpCode" class="form-label fw-bold">Kode OTP <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="otpCode" 
                            placeholder="Masukkan 6 digit kode OTP"
                            maxlength="6"
                        >
                        <div class="form-text">Kode OTP akan dikirim ke contact@greenenergy.co.id</div>
                    </div>
                </div>

                <!-- STEP 2: ALASAN PENGHAPUSAN -->
                <div class="step-content" id="step2" style="display: none;">
                    <h5 class="mb-3">
                        <i class="bi bi-clipboard-check text-primary me-2"></i>Alasan Penghapusan Akun
                    </h5>
                    <p class="text-muted mb-4">Mohon beritahu kami mengapa Anda ingin menghapus akun</p>

                    <div class="reason-options">
                        <div class="form-check reason-option mb-3">
                            <input class="form-check-input" type="radio" name="alasanHapus" id="reason1" value="tidak_digunakan">
                            <label class="form-check-label" for="reason1">
                                <div class="fw-bold">Tidak lagi menggunakan layanan carbon offset</div>
                                <small class="text-muted">Perusahaan tidak memerlukan carbon offset saat ini</small>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check reason-option mb-3">
                            <input class="form-check-input" type="radio" name="alasanHapus" id="reason2" value="tutup_merger">
                            <label class="form-check-label" for="reason2">
                                <div class="fw-bold">Perusahaan tutup / merger</div>
                                <small class="text-muted">Perusahaan tidak lagi beroperasi atau bergabung dengan entitas lain</small>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check reason-option mb-3">
                            <input class="form-check-input" type="radio" name="alasanHapus" id="reason3" value="pindah_platform">
                            <label class="form-check-label" for="reason3">
                                <div class="fw-bold">Pindah ke platform lain</div>
                                <small class="text-muted">Menggunakan layanan carbon offset dari provider lain</small>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check reason-option mb-3">
                            <input class="form-check-input" type="radio" name="alasanHapus" id="reason4" value="operasional">
                            <label class="form-check-label" for="reason4">
                                <div class="fw-bold">Masalah operasional internal</div>
                                <small class="text-muted">Perubahan kebijakan atau struktur internal perusahaan</small>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check reason-option mb-3">
                            <input class="form-check-input" type="radio" name="alasanHapus" id="reason5" value="tidak_puas">
                            <label class="form-check-label" for="reason5">
                                <div class="fw-bold">Tidak puas dengan layanan</div>
                                <small class="text-muted">Ada aspek layanan yang tidak memenuhi ekspektasi</small>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check reason-option mb-3">
                            <input class="form-check-input" type="radio" name="alasanHapus" id="reasonOther" value="lainnya">
                            <label class="form-check-label" for="reasonOther">
                                <div class="fw-bold">Alasan lain</div>
                                <small class="text-muted">Jelaskan alasan Anda di bawah</small>
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>
                    </div>

                    <div id="otherReasonContainer" style="display: none;">
                        <label for="otherReasonText" class="form-label fw-bold">Jelaskan alasan Anda <span class="text-danger">*</span></label>
                        <textarea 
                            class="form-control" 
                            id="otherReasonText" 
                            rows="4" 
                            placeholder="Mohon jelaskan alasan Anda ingin menghapus akun..."
                        ></textarea>
                        <div class="form-text">Minimum 20 karakter</div>
                    </div>
                </div>

                <!-- STEP 3: PERSETUJUAN -->
                <div class="step-content" id="step3" style="display: none;">
                    <h5 class="mb-3">
                        <i class="bi bi-check2-square text-primary me-2"></i>Persetujuan
                    </h5>
                    <p class="text-muted mb-4">Mohon centang semua pernyataan berikut untuk melanjutkan</p>

                    <div class="agreement-options">
                        <div class="form-check agreement-option mb-3">
                            <input class="form-check-input" type="checkbox" id="agree1">
                            <label class="form-check-label" for="agree1">
                                Saya memahami bahwa <strong>penghapusan akun bersifat permanen</strong> dan tidak dapat dibatalkan
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check agreement-option mb-3">
                            <input class="form-check-input" type="checkbox" id="agree2">
                            <label class="form-check-label" for="agree2">
                                Saya memahami bahwa <strong>data transaksi dan sertifikat tetap disimpan</strong> untuk keperluan legal dan compliance
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check agreement-option mb-3">
                            <input class="form-check-input" type="checkbox" id="agree3">
                            <label class="form-check-label" for="agree3">
                                Saya menyetujui <strong>penghapusan akses akun perusahaan</strong> dari platform CAMAR
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>

                        <div class="form-check agreement-option mb-3">
                            <input class="form-check-input" type="checkbox" id="agree4">
                            <label class="form-check-label" for="agree4">
                                Saya telah <strong>membaca dan memahami</strong> semua konsekuensi dari penghapusan akun
                            </label>
                            <div class="check-box"><i class="bi bi-check"></i></div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: KONFIRMASI FINAL -->
                <div class="step-content" id="step4" style="display: none;">
                    <div class="text-center py-4">
                        <i class="bi bi-exclamation-triangle text-danger" style="font-size: 80px;"></i>
                        <h4 class="mt-4 mb-3">Konfirmasi Penghapusan Akun</h4>
                        <p class="text-muted mb-4">
                            Apakah Anda benar-benar yakin ingin menghapus akun Anda?<br>
                            Tindakan ini <strong>tidak dapat dibatalkan</strong>.
                        </p>

                        <div class="alert alert-danger text-start">
                            <h6 class="alert-heading fw-bold mb-2">
                                <i class="bi bi-exclamation-diamond-fill me-2"></i>Peringatan Terakhir
                            </h6>
                            <p class="mb-0">
                                Setelah Anda menekan tombol "Ya, Hapus Akun Saya", permintaan akan diproses 
                                dan Anda tidak dapat membatalkannya. Pastikan keputusan Anda sudah final.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnPrevStep" style="display: none;">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </button>
                <button type="button" class="btn btn-primary" id="btnNextStep">
                    Lanjut<i class="bi bi-arrow-right ms-2"></i>
                </button>
                <button type="button" class="btn btn-danger" id="btnFinalSubmit" style="display: none;">
                    <i class="bi bi-check-circle me-2"></i>Ya, Hapus Akun Saya
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center py-5">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 80px;"></i>
                <h4 class="mt-4 mb-3">Permintaan Berhasil Diajukan</h4>
                <p class="text-muted mb-4">
                    Permintaan penghapusan akun Anda telah kami terima dan akan diproses dalam waktu 
                    <strong>3-7 hari kerja</strong>.
                </p>
                <div class="alert alert-info text-start">
                    <h6 class="alert-heading fw-bold">Apa yang terjadi selanjutnya?</h6>
                    <ul class="mb-0">
                        <li>Tim kami akan memverifikasi permintaan Anda</li>
                        <li>Anda akan menerima email konfirmasi dalam 24 jam</li>
                        <li>Akun akan dihapus dalam 3-7 hari kerja</li>
                        <li>Data transaksi akan diarsipkan sesuai kebijakan</li>
                    </ul>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='/buyer/dashboard'">
                    <i class="bi bi-house me-2"></i>Kembali ke Dashboard
                </button>
            </div>
        </div>
    </div>
</div>

@endsection