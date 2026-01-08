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
            {{ strtoupper(substr($perusahaan->nama, 0, 2)) }}
        </div>
        <div class="company-header-info">
            <h2 class="company-name">{{ $perusahaan->nama }}</h2>
            <p class="company-tagline">{{ $perusahaan->tagline }}</p>
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