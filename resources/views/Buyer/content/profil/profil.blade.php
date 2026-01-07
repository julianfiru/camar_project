@extends('Buyer.layout.app')

@section('title', 'Profil Perusahaan - CAMAR')

@section('page-title', 'Profil Perusahaan')
@section('page-subtitle', 'Informasi lengkap perusahaan Anda')

@section('Buyer.content')

@php
    // Data dummy untuk testing (nanti akan diganti dengan data dari controller)
    $perusahaan = (object) [
        'nama' => 'PT Green Energy Indonesia',
        'tagline' => 'Energi Hijau Masa Depan | Verified ✓ Indonesia',
        'nib' => '1234567891011',
        'telepon' => '+62 21 1234-5678',
        'npwp' => '01.234.567.8-901.002',
        'email' => 'contact@greenenergy.co.id',
        'website' => 'www.greenenergy.co.id',
        'alamat' => 'Jl. Gatot Subroto Kav. 52-53, Jakarta Selatan, DKI Jakarta, 12950',
        'deskripsi' => 'PT Green Energy Indonesia adalah perusahaan pionir dalam industri energi terbarukan di Indonesia. Dengan pengalaman lebih dari 10 tahun, kami telah berkontribusi dalam penyediaan solusi energi yang ramah lingkungan dan berkelanjutan. Misi kami adalah mengurangi jejak karbon dan mendukung transisi menuju energi bersih di seluruh nusantara.',
        'status_verifikasi' => 'Terverifikasi',
        'created_at' => now(),
    ];

    // Data dokumen dummy
    $dokumens = [
        (object) [
            'nama' => 'Akta Pendirian Perusahaan',
            'keterangan' => 'Legal identity perusahaan',
            'status' => 'verified'
        ],
        (object) [
            'nama' => 'NIB',
            'keterangan' => 'Nomor Induk Berusaha',
            'status' => 'verified'
        ],
        (object) [
            'nama' => 'NPWP',
            'keterangan' => 'Nomor Pokok Wajib Pajak',
            'status' => 'verified'
        ],
        (object) [
            'nama' => 'Surat Kuasa (Opsional)',
            'keterangan' => 'Dokumen tambahan',
            'status' => 'pending'
        ],
    ];
@endphp

{{-- Success/Error Messages --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Terdapat kesalahan:</strong>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Company Header Card -->
<div class="content-section">
    <div class="company-header">
        <div class="company-avatar">
              <img src="{{ $photoUrl ?? asset('urlProfil/User1.gif') }}" 
                alt="Profile" 
                class="w-100 h-100 rounded-3" 
                style="object-fit: cover;">
        </div>
        <div class="company-header-info">
            <h2 class="company-name">{{ $perusahaan->nama }}</h2>
            <p class="company-tagline">{{ $perusahaan->tagline }}</p>
            <div class="company-badges">
                <span class="badge-verified">✓ Terverifikasi</span>
                <span class="badge-gold">🏆 Gold</span>
                <span class="badge-premium">🌟 Premium Member</span>
            </div>
        </div>
    </div>
</div>

<!-- Informasi Perusahaan -->
<div class="content-section">
    <h2 class="section-title">Informasi Perusahaan</h2>
    <div class="info-grid">
        <div class="info-col">
            <div class="info-item">
                <div class="info-label">Nama Lengkap Perusahaan</div>
                <div class="info-value">{{ $perusahaan->nama }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">NIB (Nomor Induk Berusaha)</div>
                <div class="info-value">{{ $perusahaan->nib }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Nomor Telepon</div>
                <div class="info-value">{{ $perusahaan->telepon }}</div>
            </div>
        </div>
        <div class="info-col">
            <div class="info-item">
                <div class="info-label">NPWP</div>
                <div class="info-value">{{ $perusahaan->npwp }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email Perusahaan</div>
                <div class="info-value info-value-primary">{{ $perusahaan->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Website</div>
                <div class="info-value info-value-primary">{{ $perusahaan->website }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Alamat Lengkap -->
<div class="content-section">
    <h2 class="section-title">Alamat Lengkap</h2>
    <div class="info-item">
        <div class="info-label">Alamat Kantor</div>
        <div class="info-value">{{ $perusahaan->alamat }}</div>
    </div>
</div>

<!-- Deskripsi Perusahaan -->
<div class="content-section">
    <h2 class="section-title">Deskripsi Perusahaan</h2>
    <p class="company-description">
        {{ $perusahaan->deskripsi }}
    </p>
</div>

<!-- Dokumen Perusahaan -->
<div class="content-section">
    <h2 class="section-title">Dokumen Perusahaan (Buyer)</h2>
    
    <div class="document-list">
        @foreach($dokumens as $dokumen)
        <div class="document-item">
            <div class="document-info">
                <h3 class="document-title">{{ $dokumen->nama }}</h3>
                <p class="document-desc">{{ $dokumen->keterangan }}</p>
            </div>
            <span class="badge {{ $dokumen->status == 'verified' ? 'badge-verified-doc' : 'badge-optional' }}">
                {{ $dokumen->status == 'verified' ? 'Terverifikasi' : 'Belum Diunggah' }}
            </span>
        </div>
        @endforeach
    </div>
</div>

<!-- Upload Dokumen Tambahan -->
<div class="content-section">
    <h2 class="section-title">Upload Dokumen Verifikasi Tambahan (Opsional)</h2>
    
    <form action="#" method="POST" enctype="multipart/form-data" onsubmit="event.preventDefault(); alert('Fitur upload akan aktif setelah sistem login diimplementasikan');">
        @csrf
        <div class="form-group mb-3">
            <label class="form-label">Jenis Dokumen</label>
            <select class="form-select" name="jenis_dokumen">
                <option value="">Pilih jenis dokumen</option>
                <option value="surat_pernyataan">Surat Pernyataan Manajemen</option>
                <option value="audit_internal">Dokumen Audit Internal</option>
                <option value="lainnya">Dokumen Pendukung Lainnya</option>
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label class="form-label">File Dokumen</label>
            <input type="file" class="form-control file-input" name="dokumen" accept=".pdf,.doc,.docx">
            <p class="form-text text-muted">
                <small>Format: PDF, DOC, DOCX (Max: 5MB)</small><br>
                <small class="text-warning">⚠️ Status: Fitur upload akan aktif setelah sistem login diimplementasikan</small>
            </p>
        </div>
        
        <button type="submit" class="btn btn-primary">Upload Dokumen</button>
    </form>
</div>

<!-- Metode Pembayaran -->
<div class="content-section">
    <h2 class="section-title">Metode Pembayaran</h2>
    
    <ul class="payment-list">
        <li>💳 Transfer Bank</li>
        <li>🏦 Virtual Account</li>
        <li>💰 Kartu Kredit (Opsional)</li>
    </ul>
    
    <p class="payment-note">
        Metode pembayaran digunakan khusus untuk transaksi pembelian carbon offset.
    </p>
</div>

<!-- Status Akun -->
<div class="content-section">
    <h2 class="section-title">Status Akun</h2>
    
    <div class="status-grid">
        <div class="status-item">
            <div class="status-label">Tanggal Bergabung</div>
            <strong class="status-value">{{ $perusahaan->created_at->format('d F Y') }}</strong>
        </div>
        <div class="status-item">
            <div class="status-label">Status Verifikasi</div>
            <strong class="status-value status-verified">✓ {{ $perusahaan->status_verifikasi }}</strong>
        </div>
        <div class="status-item">
            <div class="status-label">Tingkat Keanggotaan</div>
            <strong class="status-value status-gold">🏆 Gold Member</strong>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Script untuk demo testing
document.addEventListener('DOMContentLoaded', function() {
    console.log('Halaman Profil Perusahaan berhasil dimuat');
    console.log('Status: Mode Testing dengan Data Dummy');
});
</script>
@endpush