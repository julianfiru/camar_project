@extends('MarketPlace.layout.app')

@section('title', 'Registrasi')
@section('description', 'Daftar akun CAMAR untuk mengakses platform carbon offset terpercaya di Indonesia')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/MarketPlace/register.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
@endpush

@section('content')
<!-- Register Page -->
<div class="register-page">
    <div class="register-container">
        <!-- Logo -->
        <div class="register-logo">
            <img src="{{ asset('images/MarketPlace/logo-camar.svg') }}" alt="CAMAR">
            <h1>CAMAR</h1>
            <p>Daftar Akun Baru</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <h4 style="margin-top: 0;"><i class="fas fa-exclamation-triangle"></i> Terjadi Kesalahan:</h4>
                <ul style="margin: 0.5rem 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Progress Steps -->
        <div class="progress-steps">
            <div class="progress-line">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <div class="step active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Tipe Akun</div>
            </div>
            <div class="step" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Data Perusahaan</div>
            </div>
            <div class="step" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Foto Profil</div>
            </div>
            <div class="step" data-step="4">
                <div class="step-number">4</div>
                <div class="step-label">Dokumen</div>
            </div>
            <div class="step" data-step="5">
                <div class="step-number">5</div>
                <div class="step-label">Verifikasi</div>
            </div>
        </div>

        <!-- Registration Form -->
        <form id="registerForm" method="POST" action="{{ route('register.process') }}" enctype="multipart/form-data">
            @csrf

            <!-- STEP 1: Tipe Akun -->
            <div class="form-step active" data-step="1">
                <h2 class="step-title">Pilih Tipe Akun</h2>
                <p class="step-subtitle">Pilih jenis akun yang sesuai dengan kebutuhan Anda</p>

                <div class="account-types">
                    <div class="account-card" onclick="selectAccountType('buyer', this)">
                        <div class="account-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3>Buyer</h3>
                        <p>Perusahaan yang ingin membeli kredit karbon untuk offset emisi</p>
                        <div class="account-check">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                    <div class="account-card" onclick="selectAccountType('seller', this)">
                        <div class="account-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <h3>Seller</h3>
                        <p>Penyedia proyek carbon offset yang ingin menjual kredit karbon</p>
                        <div class="account-check">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="accountType" name="account_type" required>
            </div>

            <!-- STEP 2: Data Perusahaan -->
            <div class="form-step" data-step="2">
                <h2 class="step-title">Data Perusahaan</h2>
                <p class="step-subtitle">Lengkapi informasi perusahaan Anda</p>

                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-building"></i> Nama Perusahaan <span class="required">*</span></label>
                        <input type="text" name="company_name" placeholder="PT. Nama Perusahaan" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email Perusahaan <span class="required">*</span></label>
                        <input type="email" name="company_email" placeholder="email@perusahaan.com" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> No. Telepon <span class="required">*</span></label>
                        <input type="tel" name="phone" placeholder="+62 812-3456-7890" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-industry"></i> Industri <span class="required">*</span></label>
                        <select name="industry" required>
                            <option value="">Pilih industri</option>
                            <option value="manufacturing">Manufacturing</option>
                            <option value="energy">Energy & Utilities</option>
                            <option value="transport">Transportation</option>
                            <option value="agriculture">Agriculture & Forestry</option>
                            <option value="mining">Mining</option>
                            <option value="technology">Technology</option>
                            <option value="retail">Retail & Consumer</option>
                            <option value="finance">Finance</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label><i class="fas fa-map-marker-alt"></i> Alamat Perusahaan <span class="required">*</span></label>
                        <textarea name="address" rows="3" placeholder="Alamat lengkap perusahaan" required></textarea>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Nama Lengkap <span class="required">*</span></label>
                        <input type="text" name="full_name" placeholder="Nama lengkap Anda" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-briefcase"></i> Jabatan <span class="required">*</span></label>
                        <input type="text" name="position" placeholder="CEO, Manager, dll" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-id-card"></i> NIB/SIUP</label>
                        <input type="text" name="nib_number" placeholder="Nomor Induk Berusaha">
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-file-invoice"></i> NPWP</label>
                        <input type="text" name="npwp_number" placeholder="Nomor Pokok Wajib Pajak">
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-globe"></i> Website</label>
                        <input type="url" name="website" placeholder="https://www.perusahaan.com">
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-flag"></i> Negara</label>
                        <input type="text" name="country" placeholder="Indonesia" value="Indonesia">
                    </div>

                    <div class="form-group full-width">
                        <label><i class="fas fa-info-circle"></i> Bio Perusahaan</label>
                        <textarea name="bio" rows="3" placeholder="Deskripsi singkat tentang perusahaan Anda"></textarea>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-lock"></i> Password <span class="required">*</span></label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-lock"></i> Konfirmasi Password <span class="required">*</span></label>
                        <div class="password-wrapper">
                            <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Ketik ulang password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Foto Profil (OPSIONAL) -->
            <div class="form-step" data-step="3">
                <h2 class="step-title">Foto Profil</h2>
                <p class="step-subtitle">Upload foto profil perusahaan Anda <span class="optional-badge">(Opsional)</span></p>

                <div class="profile-photo-section">
                    <!-- Preview Circle -->
                    <div class="photo-preview">
                        <div class="photo-circle" id="photoPreview">
                            <i class="fas fa-building"></i>
                            <span>No Photo</span>
                        </div>
                    </div>

                    <!-- Upload Button -->
                    <div class="photo-upload">
                        <input type="file" id="profilePhotoInput" accept="image/*" style="display: none;">
                        <button type="button" class="btn-upload" onclick="document.getElementById('profilePhotoInput').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            Pilih Foto
                        </button>
                        <p class="upload-hint">Format: JPG, PNG (Max 5MB) - Tidak wajib diisi</p>
                    </div>

                    <!-- Crop Modal -->
                    <div class="crop-modal" id="cropModal" style="display: none;">
                        <div class="crop-content">
                            <div class="crop-header">
                                <h3>Crop Foto Profil</h3>
                                <button type="button" class="btn-close-crop" onclick="closeCropModal()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="crop-container">
                                <img id="cropImage" src="">
                            </div>
                            <div class="crop-actions">
                                <button type="button" class="btn-crop-cancel" onclick="closeCropModal()">Batal</button>
                                <button type="button" class="btn-crop-save" onclick="saveCroppedImage()">
                                    <i class="fas fa-check"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="croppedImage" name="profile_photo">
                </div>
            </div>

            <!-- STEP 4: Dokumen -->
            <div class="form-step" data-step="4">
                <h2 class="step-title">Dokumen Perusahaan</h2>
                <p class="step-subtitle">Upload dokumen pendukung perusahaan Anda</p>

                <!-- Documents for ALL users -->
                <div class="documents-section">
                    <h3 class="doc-section-title">Dokumen Wajib (Semua Pengguna)</h3>

                    <div class="document-item">
                        <div class="doc-info">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h4>Akta Pendirian</h4>
                                <p>Dokumen pendirian perusahaan</p>
                            </div>
                        </div>
                        <div class="doc-upload">
                            <input type="file" id="doc1" name="akta" accept=".pdf,.jpg,.png" onchange="updateFileIndicator('doc1')">
                            <label for="doc1" class="btn-upload-doc">
                                <i class="fas fa-upload"></i>
                                Upload
                            </label>
                            <span class="file-indicator" id="indicator-doc1"></span>
                            <button type="button" class="btn-upload-gdrive" onclick="setGoogleDriveLink('doc1','akta')">
                                <i class="fab fa-google-drive"></i>
                                Drive
                            </button>
                            <span class="doc-badge required">Wajib</span>
                            <input type="hidden" name="akta_drive_url" id="akta_drive_url">
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="doc-info">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h4>NPWP Perusahaan</h4>
                                <p>Nomor Pokok Wajib Pajak</p>
                            </div>
                        </div>
                        <div class="doc-upload">
                            <input type="file" id="doc2" name="npwp" accept=".pdf,.jpg,.png" onchange="updateFileIndicator('doc2')">
                            <label for="doc2" class="btn-upload-doc">
                                <i class="fas fa-upload"></i>
                                Upload
                            </label>
                            <span class="file-indicator" id="indicator-doc2"></span>
                            <button type="button" class="btn-upload-gdrive" onclick="setGoogleDriveLink('doc2','npwp')">
                                <i class="fab fa-google-drive"></i>
                                Drive
                            </button>
                            <span class="doc-badge required">Wajib</span>
                            <input type="hidden" name="npwp_drive_url" id="npwp_drive_url">
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="doc-info">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h4>NIB / SIUP</h4>
                                <p>Nomor Induk Berusaha atau SIUP</p>
                            </div>
                        </div>
                        <div class="doc-upload">
                            <input type="file" id="doc3" name="nib" accept=".pdf,.jpg,.png" onchange="updateFileIndicator('doc3')">
                            <label for="doc3" class="btn-upload-doc">
                                <i class="fas fa-upload"></i>
                                Upload
                            </label>
                            <span class="file-indicator" id="indicator-doc3"></span>
                            <button type="button" class="btn-upload-gdrive" onclick="setGoogleDriveLink('doc3','nib')">
                                <i class="fab fa-google-drive"></i>
                                Drive
                            </button>
                            <span class="doc-badge required">Wajib</span>
                            <input type="hidden" name="nib_drive_url" id="nib_drive_url">
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="doc-info">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h4>ISO 14001</h4>
                                <p>Sertifikat ISO (jika ada)</p>
                            </div>
                        </div>
                        <div class="doc-upload">
                            <input type="file" id="doc4" name="iso" accept=".pdf,.jpg,.png" onchange="updateFileIndicator('doc4')">
                            <label for="doc4" class="btn-upload-doc">
                                <i class="fas fa-upload"></i>
                                Upload
                            </label>
                            <span class="file-indicator" id="indicator-doc4"></span>
                            <button type="button" class="btn-upload-gdrive" onclick="setGoogleDriveLink('doc4','iso')">
                                <i class="fab fa-google-drive"></i>
                                Drive
                            </button>
                            <span class="doc-badge optional">Opsional</span>
                            <input type="hidden" name="iso_drive_url" id="iso_drive_url">
                        </div>
                    </div>
                </div>

                <!-- Documents for SELLER only -->
                <div class="documents-section seller-docs" id="sellerDocs" style="display: none;">
                    <h3 class="doc-section-title">Dokumen Tambahan (Seller)</h3>
                    <p class="doc-note">
                        <i class="fas fa-info-circle"></i>
                        Minimal upload 1 dari 2 dokumen sertifikasi berikut
                    </p>

                    <div class="document-item">
                        <div class="doc-info">
                            <i class="fas fa-certificate"></i>
                            <div>
                                <h4>Gold Standard Certification</h4>
                                <p>Sertifikat Gold Standard</p>
                            </div>
                        </div>
                        <div class="doc-upload">
                            <input type="file" id="doc5" name="gold_standard" accept=".pdf,.jpg,.png" onchange="updateFileIndicator('doc5')">
                            <label for="doc5" class="btn-upload-doc">
                                <i class="fas fa-upload"></i>
                                Upload
                            </label>
                            <span class="file-indicator" id="indicator-doc5"></span>
                            <button type="button" class="btn-upload-gdrive" onclick="setGoogleDriveLink('doc5','gold_standard')">
                                <i class="fab fa-google-drive"></i>
                                Drive
                            </button>
                            <span class="doc-badge seller">Seller</span>
                            <input type="hidden" name="gold_standard_drive_url" id="gold_standard_drive_url">
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="doc-info">
                            <i class="fas fa-certificate"></i>
                            <div>
                                <h4>VCS Verification Report</h4>
                                <p>Laporan Verifikasi VCS</p>
                            </div>
                        </div>
                        <div class="doc-upload">
                            <input type="file" id="doc6" name="vcs" accept=".pdf,.jpg,.png" onchange="updateFileIndicator('doc6')">
                            <label for="doc6" class="btn-upload-doc">
                                <i class="fas fa-upload"></i>
                                Upload
                            </label>
                            <span class="file-indicator" id="indicator-doc6"></span>
                            <button type="button" class="btn-upload-gdrive" onclick="setGoogleDriveLink('doc6','vcs')">
                                <i class="fab fa-google-drive"></i>
                                Drive
                            </button>
                            <span class="doc-badge seller">Seller</span>
                            <input type="hidden" name="vcs_drive_url" id="vcs_drive_url">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 5: Verifikasi -->
            <div class="form-step" data-step="5">
                <h2 class="step-title">Verifikasi & Konfirmasi</h2>
                <p class="step-subtitle">Periksa kembali data Anda sebelum mendaftar</p>

                <div class="verification-success">
                    <i class="fas fa-check-circle"></i>
                    <h3>Data Lengkap!</h3>
                    <p>Semua informasi telah terisi dengan benar</p>
                </div>

                <div class="terms-section">
                    <label class="terms-checkbox">
                        <input type="checkbox" id="termsCheck" name="terms" required>
                        <span>
                            Saya menyetujui 
                            <a href="#" target="_blank">Syarat & Ketentuan</a> 
                            dan 
                            <a href="#" target="_blank">Kebijakan Privasi</a> 
                            CAMAR
                        </span>
                    </label>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="form-navigation">
                <button type="button" class="btn-prev" id="prevBtn" onclick="changeStep(-1)" style="display: none;">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </button>
                <button type="button" class="btn-next" id="nextBtn" onclick="changeStep(1)">
                    Lanjut
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button type="button" class="btn-submit" id="submitBtn" style="display: none;" onclick="submitRegisterForm()">
                    <i class="fas fa-check"></i>
                    Daftar Sekarang
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="login-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </div>

    <!-- Back to Home Button - Di bawah container -->
    <a href="{{ route('home') }}" class="btn-back-home">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Beranda</span>
    </a>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script src="{{ asset('js/MarketPlace/register.js') }}"></script>
@endpush