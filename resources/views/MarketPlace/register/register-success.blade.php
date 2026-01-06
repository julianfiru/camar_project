@extends('MarketPlace.layout.app')

@section('title', 'Registrasi Berhasil')
@section('description', 'Pemberitahuan bahwa akun CAMAR Anda telah terdaftar dan menunggu persetujuan administrator/auditor')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/MarketPlace/register.css') }}">
@endpush

@section('content')
<div class="register-success-page">
    <div class="register-success-card">
        <div class="success-icon-wrapper">
            <div class="success-icon-circle">
                <i class="fas fa-check"></i>
            </div>
        </div>
        <h1 class="success-title">Pendaftaran Berhasil Dikirim</h1>
        <p class="success-subtitle">
            Terima kasih telah melakukan pendaftaran akun di platform <strong>CAMAR</strong>.
        </p>
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @else
            <p class="success-message">
                Data perusahaan dan informasi akun Anda telah kami terima. 
                Saat ini akun berstatus <strong>menunggu persetujuan</strong> dari tim administrator/auditor.
            </p>
        @endif
        <p class="success-detail">
            Proses peninjauan bertujuan untuk memastikan bahwa seluruh data perusahaan, dokumen pendukung, serta profil 
            telah sesuai dengan ketentuan dan standar verifikasi yang berlaku. Anda akan menerima pemberitahuan melalui email 
            terdaftar setelah akun dinyatakan aktif dan dapat digunakan untuk mengakses seluruh fitur platform.
        </p>

        <div class="success-actions">
            <a href="{{ route('home') }}" class="btn-success-primary">
                <i class="fas fa-home"></i>
                Kembali ke Beranda
            </a>
            <a href="{{ route('login') }}" class="btn-success-secondary">
                <i class="fas fa-sign-in-alt"></i>
                Masuk ke Halaman Login
            </a>
        </div>

        <p class="success-note">
            Apabila Anda memerlukan bantuan lebih lanjut atau ingin menanyakan status persetujuan akun, 
            silakan menghubungi tim kami melalui kanal dukungan resmi CAMAR.
        </p>
    </div>
</div>
@endsection
