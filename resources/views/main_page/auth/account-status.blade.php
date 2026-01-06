@extends('main_page.layout.app')

@section('title', 'Status Akun')
@section('description', 'Informasi status akun CAMAR Anda')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<style>
    .account-status-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        position: relative;
        overflow: hidden;
    }
    .account-status-page::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('images/mangrove0.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(20px);
        transform: scale(1.1);
        z-index: -1;
    }
    .account-status-page::after {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.35);
        z-index: -1;
    }
    .account-status-card {
        max-width: 720px;
        width: 100%;
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(12px);
        border-radius: 24px;
        padding: 2.5rem 2.25rem;
        box-shadow: 0 22px 70px rgba(0, 0, 0, 0.18);
        text-align: center;
    }
    .account-status-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.35rem 0.9rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    .account-status-chip.pending {
        background: #fff3cd;
        color: #856404;
    }
    .account-status-chip.info {
        background: #d1ecf1;
        color: #0c5460;
    }
    .account-status-chip.rejected {
        background: #f8d7da;
        color: #721c24;
    }
    .account-status-title {
        font-family: 'Manrope', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        color: #124170;
        margin-bottom: 0.75rem;
    }
    .account-status-subtitle {
        font-size: 0.98rem;
        color: #6c757d;
        margin-bottom: 1.25rem;
    }
    .account-status-description {
        font-size: 0.95rem;
        color: #495057;
        line-height: 1.7;
        margin-bottom: 1.75rem;
    }
    .account-status-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.75rem;
    }
    .account-status-actions a {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.4rem;
        border-radius: 999px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.25s ease;
    }
    .account-status-primary {
        background: linear-gradient(135deg, #67C090, #26667F);
        color: #fff;
        border: none;
    }
    .account-status-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 26px rgba(103, 192, 144, 0.45);
    }
    .account-status-secondary {
        background: #ffffff;
        color: #26667F;
        border: 2px solid rgba(38, 102, 127, 0.22);
    }
    .account-status-secondary:hover {
        background: rgba(38, 102, 127, 0.05);
    }
    @media (max-width: 576px) {
        .account-status-card {
            padding: 2.25rem 1.5rem;
        }
        .account-status-title {
            font-size: 1.6rem;
        }
    }
</style>
@endpush

@section('content')
<div class="account-status-page">
    <div class="account-status-card">
        <div class="account-status-chip {{ $statusBadge }}">
            @if($statusBadge === 'pending')
                <i class="fas fa-clock"></i>
                <span>Menunggu Verifikasi</span>
            @elseif($statusBadge === 'rejected')
                <i class="fas fa-times-circle"></i>
                <span>Registrasi Ditolak</span>
            @else
                <i class="fas fa-info-circle"></i>
                <span>Informasi Akun</span>
            @endif
        </div>

        <h1 class="account-status-title">{{ $statusLabel }}</h1>
        <p class="account-status-subtitle">
            Hai, <strong>{{ $email }}</strong>.<br>
            Berikut adalah status terbaru dari akun CAMAR Anda.
        </p>

        <p class="account-status-description">{{ $statusDescription }}</p>

        <div class="account-status-actions">
            <a href="{{ route('home') }}" class="account-status-primary">
                <i class="fas fa-home"></i>
                <span>Kembali ke Beranda</span>
            </a>
            <a href="{{ route('login') }}" class="account-status-secondary">
                <i class="fas fa-sign-in-alt"></i>
                <span>Kembali ke Halaman Login</span>
            </a>
        </div>
    </div>
</div>
@endsection
