@extends('Seller.layout.app')
@section('title', 'CAMAR - Profil')
@section('page-title', 'Profil Perusahaan')
@section('page-subtitle', 'Kelola informasi dan dokumen perusahaan Anda')
@section('content')
    <!-- Company Header -->
    <div class="bs mb-4">
        <div class="d-flex align-items-start gap-4 mb-4">
            <div class="flex-shrink-0">
                <div class="company-logo d-flex align-items-center justify-content-center fw-bold fs-1 text-white rounded-3">
                    <img src="{{ asset($photoUrl) }}" 
                        alt="Profile" 
                        class="w-100 h-100 rounded-3" 
                        style="object-fit: cover;">
                </div>
            </div>
            <div class="flex-grow-1">
                <h2 class="fw-bold mb-2 stat-value">{{ $companyName }}</h2>
                <p class="fs-5 mb-3 stat-header">{{ $profil->bio }}</p>
                <div class="my-3">
                    <span class="badge rounded-pill fw-normal p-2 px-3 {{ $statusStyle }}">{{ $statusSeller }}</span>
                    <span class="badge rounded-pill fw-normal p-2 px-3 ms-2" style="{{ $badgeStyle }}">{{ $badgeLevel }}</span>
                </div>
                <div class="d-flex flex-wrap gap-4 mt-3 stat-header">
                    <div class="d-flex align-items-center gap-2">
                        <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $profil->country }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <span>Bergabung sejak {{ \Carbon\Carbon::parse($profil->verified_at)->translatedFormat('F Y') }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $totalAktif }} Proyek Aktif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Company Information -->
    <div class="bs mb-4">
        <div class="border-0 d-flex justify-content-between align-items-center py-3">
            <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                <h2 class="fw-bold mb-0 stat-value">Informasi Perusahaan</h5>
                <button class="btn text-white basefont fw-bold btn-sm px-3 bdc-green">
                    Edit Informasi
                </button>
            </div>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Nama Lengkap Perusahaan</div>
                    <div class="fs-5 fw-medium stat-value">{{ $companyName }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">NPWP</div>
                    <div class="fs-5 fw-medium stat-value">{{ $profil->npwp }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">NIB (Nomor Induk Berusaha)</div>
                    <div class="fs-5 fw-medium stat-value">{{ $profil->nib }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Email Perusahaan</div>
                    <div class="fs-5 fw-medium stat-value">{{ $email->email}}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Nomor Telepon</div>
                    <div class="fs-5 fw-medium stat-value">{{ $profil->phone_number }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Website</div>
                    <div class="fs-5 fw-medium stat-value">{{ $profil->website }}</div>
                </div>
            </div>
            <div class="col-12">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Alamat Lengkap</div>
                    <div class="fs-5 fw-medium stat-value">{{ $profil->website }}</div>
                </div>
            </div>
            <div class="col-12">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Deskripsi Perusahaan</div>
                    <div class="fs-5 fw-medium stat-value">
                        {{ $profil->desc }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Legal Documents & Certificates -->
    <div class="bs mb-4">
        <div class="border-0 d-flex justify-content-between align-items-center py-3">
            <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                <h5 class="fw-bold mb-0 stat-value">Dokumen Legal & Sertifikat</h5>
                <button class="btn text-white basefont fw-bold btn-sm px-3 bgc-green">
                    + Upload Dokumen
                </button>
            </div>
        </div>
        <div class="row g-4">
            @forelse($document as $documents)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="document-card h-100 p-4 rounded-3 d-flex flex-column">
                        <div class="mb-3 text-secondary">
                            <svg width="32" height="32" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="fw-semibold fs-5 mb-3 stat-value">{{ $documents->document_name }}</div>
                        <div class="d-flex justify-content-between align-items-center small mt-auto stat-header">
                            <span>{{ format_ukuran_kb($documents->size) }}</span>
                            <span class="badge rounded-pill px-3 py-2 fw-normal {{ get_status_style($documents->document_status) }}">{{ statusVerifikasi($documents->document_status) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <span>
                    Belum ada dokumen.
                </span>
            @endforelse
        </div>
        <div class="upload-area p-5 mt-5 text-center rounded-4">
            <div class="mb-3 text-secondary">
                <svg style="width: 48px; height: 48px;" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="fw-bold mb-2" style="color: var(--upload-text-title);">Upload Dokumen Baru</h3>
            <p class="text-secondary fs-5 mb-0">Klik atau drag & drop file PDF, maksimal 10MB</p>
        </div>
    </div>

    <!-- Bank Account Information -->
    <div class="bs mb-4">
        <div class="border-0 d-flex justify-content-between align-items-center py-3">
            <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                <h2 class="fw-bold fs-2 mb-0 stat-value">Informasi Rekening Bank</h5>
                <button class="btn text-white basefont fw-bold btn-sm px-3 bdc-green">
                    Edit Rekening
                </button>
            </div>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Nama Bank</div>
                    <div class="fs-5 fw-medium stat-value">{{ $bank->bank_name }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Nomor Rekening</div>
                    <div class="fs-5 fw-medium stat-value">{{ $bank->account_number }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Nama Pemegang Rekening</div>
                    <div class="fs-5 fw-medium stat-value">{{ $bank->seller->company_name}}</div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-card h-100 p-4 rounded-3">
                    <div class="small fw-semibold mb-2 stat-header">Cabang Bank</div>
                    <div class="fs-5 fw-medium stat-value">{{ $bank->bank_branch }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Verification Status -->
    <div class="bs">
        <div class="section-header">
            <h2 class="section-title">Status Verifikasi</h2>
        </div>
        
        <div class="card-sertif">
            <div class="d-flex align-items-center gap-3 mb-3">
                <svg width="24" height="24" fill="var(--green)" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="mb-1 ftc-blue fs-5">Perusahaan Terverifikasi ✓</h3>
                    <p class="text-secondary">Akun Anda telah diverifikasi oleh tim CAMAR</p>
                </div>
            </div>
            <div class="d-grid gap-3 mt-3" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                <div>
                    <p class="text-secondary fs-5">Tanggal Verifikasi</p>
                    <p class="ftc-blue fs-5 fw-bold">{{ \Carbon\Carbon::parse($profil->verified_at)->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <p class="text-secondary fs-5">Berlaku Hingga</p>
                    <p class="ftc-blue fs-5 fw-bold">{{ \Carbon\Carbon::parse($profil->verified_at)->addMonth()->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <p class="text-secondary fs-5">Tier Status</p>
                    <p class="ftc-blue fs-5 fw-bold">{{ $badgeLevel }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('detail/projek/detail_project.js') }}"></script>
@endpush