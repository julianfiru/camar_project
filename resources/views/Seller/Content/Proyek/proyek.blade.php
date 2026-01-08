@extends('Seller.layout.app')
@section('title', 'CAMAR - Proyek')
@section('page-title', 'Manajemen Proyek')
@section('page-subtitle', 'Kelola semua proyek carbon offset Anda')
@section('content')
    <div class="row g-4 mb-4"> 
        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100"> 
                <div class="stat-header">Total Proyek</div>
                <div class="stat-value fs-2">{{ $totalProyek }}</div>
                <div class="ftc-green">Semua Waktu</div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100"> 
                <div class="stat-header">Total Proyek Aktif</div>
                <div class="stat-value fs-2">{{ $totalAktif }}</div>
                <div class="ftc-green">↑ {{ $projects->where('status', 2)->filter(fn($p) => \Carbon\Carbon::parse($p->created_at)->year == now()->year)->count() }} proyek baru</div>
            </div>
        </div>
        
        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100">
                <div class="stat-header">Verifikasi Pending</div>
                <div class="stat-value fs-2">{{ $totalPending }}</div>
                <div class="ftc-yellow">Menunggu auditor</div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100">
                <div class="stat-header">Dibatalkan</div>
                <div class="stat-value fs-2">{{ $totalBatal }}</div>
                <div class="ftc-red">{{ $totalBatal / $totalProyek * 100}}% dari total</div>
            </div>
        </div>
    </div>
    
    <div class="bs mb-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap gap-3">
                <button class="btn fw-bold btn-sm bdc-green active" data-filter="all">Semua ({{ $totalProyek }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="active">Aktif ({{ $totalAktif }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="pending">Pending ({{ $totalPending }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="cancelled">Dibatalkan ({{ $totalBatal }})</button>
            </div>
            <button class="btn text-white basefont fw-bold btn-sm px-3 bgc-green">+ Tambah Proyek Baru</button>
        </div>
    </div>

    <div class="bs">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Lokasi</th>
                    <th>Total Credit</th>
                    <th>Tersedia</th>
                    <th>Harga/tCO2e</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $item)
                    <tr class="project-row" data-status="{{ $item->status }}">
                        <td class="ps-4 fw-bold">{{ $item->project_name }}</td>
                        <td class="p-3">
                            {{ $item->location }} 
                        </td>
                        <td class="p-3">
                            {{ number_format($item->total_capacity_ton, 0, ',', '.') }} tCO2e
                        </td>
                        <td class="p-3">
                            {{ number_format($item->available_capacity_ton, 0, ',', '.') }} tCO2e
                        </td>
                        <td class="p-3">
                            Rp {{ number_format($item->price, 0, ',', '.')}} 
                        </td>
                        <td class="text-end pe-4">
                            <span class="badge px-3 {{ get_status_style($item->status) }}">
                                {{ statusProyek($item->status) }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm rounded-pill bdc-green" 
                                data-bs-target="#projectModal"
                                onclick="showProjectDetail(this)"  
                                data-url="{{ route('seller.project.detail', $item->project_id) }}">
                                Detail
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            Belum ada proyek yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('Seller.Content.Proyek.tproyek')
    <script src="{{ asset('js/seller/proyek/Proyek.js') }}"></script>
@endsection