<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registrasi - CAMAR">
    <title>Registrasi - CAMAR</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('resources/css/register.css') }}">
</head>
<body>
    <!-- Background Image -->
    <div class="register-bg">
        <img src="{{ asset('resources/images/mangrove0.png') }}" alt="Background">
    </div>

    <!-- Register Container -->
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('resources/images/logo-camar.svg') }}" alt="CAMAR" class="logo-img">
            <h1>CAMAR</h1>
            <p>Daftar Akun Baru</p>
        </div>
        
        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress-line">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <div class="step active" data-step="1">
                <div class="step-num">1</div>
                <div class="step-label">Tipe Akun</div>
            </div>
            <div class="step" data-step="2">
                <div class="step-num">2</div>
                <div class="step-label">Data Perusahaan</div>
            </div>
            <div class="step" data-step="3">
                <div class="step-num">3</div>
                <div class="step-label">Dokumen</div>
            </div>
            <div class="step" data-step="4">
                <div class="step-num">4</div>
                <div class="step-label">Verifikasi</div>
            </div>
        </div>
        
        <!-- Registration Form -->
        <form id="regForm">
            @csrf
            
            <!-- STEP 1: Pilih Tipe Akun -->
            <div class="form-step active" data-step="1">
                <h2>Pilih Tipe Akun Anda</h2>
                <p class="subtitle">Pilih jenis akun yang sesuai dengan kebutuhan Anda</p>
                
                <div class="role-grid">
                    <div class="role-card" onclick="selectRole('buyer', this)">
                        <div class="role-icon">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="white">
                                <path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/>
                            </svg>
                        </div>
                        <h3>Buyer</h3>
                        <p>Perusahaan yang ingin membeli kredit karbon untuk offset emisi</p>
                    </div>
                    
                    <div class="role-card" onclick="selectRole('seller', this)">
                        <div class="role-icon">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="white">
                                <path d="M20 7h-4v-3c0-2.209-1.791-4-4-4s-4 1.791-4 4v3h-4l-2 17h20l-2-17zm-11-3c0-1.654 1.346-3 3-3s3 1.346 3 3v3h-6v-3zm-4.751 18l1.529-13h2.222v1.5c0 .276.224.5.5.5s.5-.224.5-.5v-1.5h6v1.5c0 .276.224.5.5.5s.5-.224.5-.5v-1.5h2.222l1.529 13h-15.502z"/>
                            </svg>
                        </div>
                        <h3>Seller</h3>
                        <p>Penyedia proyek carbon offset yang ingin menjual kredit karbon</p>
                    </div>
                </div>
                
                <input type="hidden" id="accountType" name="account_type" required>
            </div>
            
            <!-- STEP 2: Data Perusahaan -->
            <div class="form-step" data-step="2">
                <h2>Data Perusahaan</h2>
                <p class="subtitle">Lengkapi informasi perusahaan Anda</p>
                
                <div class="form-row">
                    <div class="form-group">
                        <label><i class="fas fa-building"></i> Nama Perusahaan <span class="required">*</span></label>
                        <input type="text" name="company_name" placeholder="PT. Nama Perusahaan" required>
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email Perusahaan <span class="required">*</span></label>
                        <input type="email" name="company_email" placeholder="email@perusahaan.com" required>
                    </div>
                </div>
                
                <div class="form-row">
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
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-map-marker-alt"></i> Alamat Perusahaan <span class="required">*</span></label>
                    <textarea name="address" rows="3" placeholder="Alamat lengkap perusahaan" required></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Nama Lengkap <span class="required">*</span></label>
                        <input type="text" name="full_name" placeholder="Nama lengkap Anda" required>
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-briefcase"></i> Jabatan <span class="required">*</span></label>
                        <input type="text" name="position" placeholder="CEO, Manager, dll" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label><i class="fas fa-lock"></i> Password <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-lock"></i> Konfirmasi Password <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="password" id="confirmPassword" name="confirm_password" placeholder="Ketik ulang password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- STEP 3: Dokumen -->
            <div class="form-step" data-step="3">
                <h2>Upload Dokumen</h2>
                <p class="subtitle">Upload dokumen yang diperlukan untuk verifikasi</p>
                
                <!-- Dokumen Umum -->
                <div class="doc-section">
                    <h3 class="doc-section-title"><i class="fas fa-folder"></i> Dokumen Perusahaan</h3>
                    
                    <div class="doc-item">
                        <div class="doc-header">
                            <h4><i class="fas fa-file-pdf"></i> Akta Pendirian</h4>
                            <span class="badge required">Wajib</span>
                        </div>
                        <p class="doc-desc">Upload akta pendirian perusahaan dalam format PDF (Max 5MB)</p>
                        <input type="file" id="akta" name="akta" accept=".pdf" class="file-input" required>
                        <label for="akta" class="file-label">
                            <i class="fas fa-upload"></i>
                            <span>Pilih File</span>
                        </label>
                        <div class="file-name" id="aktaName"></div>
                    </div>
                    
                    <div class="doc-item">
                        <div class="doc-header">
                            <h4><i class="fas fa-file-pdf"></i> NPWP Perusahaan</h4>
                            <span class="badge required">Wajib</span>
                        </div>
                        <p class="doc-desc">Upload NPWP perusahaan dalam format PDF, JPG, atau PNG (Max 5MB)</p>
                        <input type="file" id="npwp" name="npwp" accept=".pdf,.jpg,.jpeg,.png" class="file-input" required>
                        <label for="npwp" class="file-label">
                            <i class="fas fa-upload"></i>
                            <span>Pilih File</span>
                        </label>
                        <div class="file-name" id="npwpName"></div>
                    </div>
                    
                    <div class="doc-item">
                        <div class="doc-header">
                            <h4><i class="fas fa-file-pdf"></i> NIB / SIUP</h4>
                            <span class="badge required">Wajib</span>
                        </div>
                        <p class="doc-desc">Upload Nomor Induk Berusaha (NIB) atau Surat Izin Usaha Perdagangan (Max 5MB)</p>
                        <input type="file" id="nib" name="nib" accept=".pdf,.jpg,.jpeg,.png" class="file-input" required>
                        <label for="nib" class="file-label">
                            <i class="fas fa-upload"></i>
                            <span>Pilih File</span>
                        </label>
                        <div class="file-name" id="nibName"></div>
                    </div>
                    
                    <div class="doc-item">
                        <div class="doc-header">
                            <h4><i class="fas fa-file-pdf"></i> ISO 14001</h4>
                            <span class="badge optional">Opsional</span>
                        </div>
                        <p class="doc-desc">Sertifikat ISO 14001 (Environmental Management System) jika tersedia (Max 5MB)</p>
                        <input type="file" id="iso" name="iso" accept=".pdf,.jpg,.jpeg,.png" class="file-input">
                        <label for="iso" class="file-label">
                            <i class="fas fa-upload"></i>
                            <span>Pilih File</span>
                        </label>
                        <div class="file-name" id="isoName"></div>
                    </div>
                </div>
                
                <!-- Dokumen Khusus Seller -->
                <div class="doc-section seller-only" style="display: none;">
                    <h3 class="doc-section-title"><i class="fas fa-certificate"></i> Dokumen Verifikasi Carbon Offset</h3>
                    <p class="doc-note">
                        <i class="fas fa-info-circle"></i>
                        <span>Minimal salah satu dari dokumen berikut harus diupload</span>
                    </p>
                    
                    <div class="doc-item">
                        <div class="doc-header">
                            <h4><i class="fas fa-file-certificate"></i> Gold Standard Certification</h4>
                            <span class="badge required-alt">Wajib*</span>
                        </div>
                        <p class="doc-desc">Sertifikat Gold Standard untuk proyek carbon offset Anda (Max 5MB)</p>
                        <input type="file" id="gold_standard" name="gold_standard" accept=".pdf,.jpg,.jpeg,.png" class="file-input seller-required">
                        <label for="gold_standard" class="file-label">
                            <i class="fas fa-upload"></i>
                            <span>Pilih File</span>
                        </label>
                        <div class="file-name" id="gold_standardName"></div>
                    </div>
                    
                    <div class="doc-item">
                        <div class="doc-header">
                            <h4><i class="fas fa-file-certificate"></i> VCS Verification Report</h4>
                            <span class="badge required-alt">Wajib*</span>
                        </div>
                        <p class="doc-desc">Verified Carbon Standard (VCS) Verification Report (Max 5MB)</p>
                        <input type="file" id="vcs" name="vcs" accept=".pdf,.jpg,.jpeg,.png" class="file-input seller-required">
                        <label for="vcs" class="file-label">
                            <i class="fas fa-upload"></i>
                            <span>Pilih File</span>
                        </label>
                        <div class="file-name" id="vcsName"></div>
                    </div>
                </div>
            </div>
            
            <!-- STEP 4: Verifikasi -->
            <div class="form-step" data-step="4">
                <h2>Review & Verifikasi</h2>
                <p class="subtitle">Periksa kembali data Anda sebelum submit</p>
                
                <div class="review-box">
                    <h4><i class="fas fa-check-circle"></i> Data telah lengkap</h4>
                    <p>Tim kami akan melakukan verifikasi dalam 1-2 hari kerja. Anda akan menerima notifikasi melalui email setelah akun diverifikasi.</p>
                </div>
                
                <div class="terms-check">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">
                        Saya menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> CAMAR
                    </label>
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="btn-group">
                <button type="button" class="btn-prev" onclick="prevStep()" style="display:none">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </button>
                <button type="button" class="btn-next" onclick="nextStep()">
                    Lanjut
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </form>
        
        <!-- Login Link -->
        <div class="login-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
        
        <!-- Back Home -->
        <div class="back-home">
            <a href="{{ route('home') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
    
    <!-- Custom JS -->
    <script src="{{ asset('resources/js/register.js') }}"></script>
</body>
</html>