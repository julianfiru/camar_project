@extends('MarketPlace.layout.app')

@section('title', 'Status Akun')
@section('description', 'Informasi status akun CAMAR')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/MarketPlace/account-status.css') }}">
@endpush

@section('content')
@php
    $status = (int) ($status ?? 1);

    $statusTitle = match ($status) {
        2 => 'Akun Anda Sudah Aktif',
        1 => 'Akun Anda Sedang Ditinjau',
        0 => 'Pendaftaran Anda Ditolak',
        default => 'Status Akun',
    };

    $statusSubtitle = match ($status) {
        2 => 'Anda bisa masuk dan menggunakan fitur platform.',
        1 => 'Kami sedang memverifikasi data dan dokumen Anda. Mohon tunggu.',
        0 => 'Mohon maaf, pendaftaran Anda belum dapat kami setujui.',
        default => 'Silakan periksa kembali status akun Anda.',
    };

    $statusClass = match ($status) {
        2 => 'status-success',
        1 => 'status-warning',
        0 => 'status-danger',
        default => 'status-neutral',
    };

    $statusLabel = match ($status) {
        2 => 'Terverifikasi / Aktif',
        1 => 'Pending / Verifikasi',
        0 => 'Ditolak',
        default => 'Tidak diketahui',
    };
@endphp

<div class="account-status-page">
    <div class="account-status-card">
        <div class="status-badge {{ $statusClass }}">
            <span class="status-dot"></span>
            <span class="status-text">{{ $statusLabel }}</span>
        </div>

        <h1 class="status-title">{{ $statusTitle }}</h1>
        <p class="status-subtitle">{{ $statusSubtitle }}</p>

        <div class="account-info">
            <div class="info-row">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $email ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tipe Akun</div>
                <div class="info-value">{{ $role ?? '-' }}</div>
            </div>
            <div class="info-row" style="background: #fff3cd;">
                <div class="info-label">DEBUG: Status Value</div>
                <div class="info-value">{{ $status }} (type: {{ gettype($status) }})</div>
            </div>
        </div>

        <div class="status-actions">
            @if($status === 2)
                <a href="{{ route('login') }}" class="btn-primary">
                    <i class="fas fa-right-to-bracket"></i>
                    Masuk Sekarang
                </a>
            @elseif($status === 1)
                <a href="{{ route('home') }}" class="btn-primary">
                    <i class="fas fa-home"></i>
                    Kembali ke Beranda
                </a>
                <a href="{{ route('login') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Login
                </a>
            @elseif($status === 0)
                <a href="{{ route('register') }}" class="btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Daftar Ulang
                </a>
                <a href="{{ route('login') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Login
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-primary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Login
                </a>
            @endif
        </div>

        <p class="status-note">
            Jika Anda membutuhkan bantuan, silakan hubungi tim CAMAR melalui kanal dukungan resmi.
        </p>
    </div>
</div>
@endsection
