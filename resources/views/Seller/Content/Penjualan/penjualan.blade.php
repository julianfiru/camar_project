@extends('Seller.layout.app')
@section('title', 'CAMAR - Penjualan')
@section('page-title', 'Penjualan Carbon Offset')
@section('page-subtitle', 'Kelola produk carbon offset yang dijual di marketplace')
@section('content')
    <div class="bs mb-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap gap-3">
                <button class="btn fw-bold btn-sm bdc-green active" data-filter="all">Semua ({{ $totalProyek }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="active">Aktif ({{ $totalAktif }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="pending">Pending ({{ $totalPending }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="cancelled">Dibatalkan ({{ $totalBatal }})</button>
            </div>
        </div>
    </div>
    <div class="bs mb-4">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <button class="btn fw-bold btn-sm bdc-green" data-filter="all">Atur ulang</button>
            <button class="btn fw-bold btn-sm bdc-green" data-filter="active">Selengkapnya</button>
        </div>
        <div class="d-flex flex-wrap gap-3">
            <input type="text" class="form-input input" placeholder="Cari Nama Produk, SKU Induk, Kode Variasi...">
            <select class="form-input stat-value w-25">
                <option class="stat-value">Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" data-type="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endforeach
            </select>
            <select class="form-input stat-value w-25">
                <option class="stat-value">Performa Produk</option>
                <option class="stat-value">Penjualan Tinggi</option>
                <option class="stat-value">Penjualan Rendah</option>
            </select>
            <button class="btn text-white basefont fw-bold btn-sm px-3 bgc-green">Terapkan</button>
        </div>
    </div>
        <!-- Products List -->
        <div class="bs">
            <div class="border-0 d-flex justify-content-between align-items-center py-3">
                <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                    <h2 class="fw-bold mb-0 stat-value">Proyek Carbon Offset</h5>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 40%;">Proyek</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Performa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $item)
                        <tr class="align-middle project-row" data-status="{{ $item->status }}"> 
                            <td>
                                <div class="d-flex gap-3">
                                    <img src="{{ asset($item->photo_url) }}" 
                                        class="product-thumb rounded" 
                                        alt="Product Image">
                                    <div>
                                        <h4 class="product-title mb-1">Nama Proyek: {{ $item->project_name }}</h4>
                                        <p class="meta-text mb-1">SKU: {{ $item->sku}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                <div class="meta-text ">per tCO2e</div>
                            </td>
                            <td>
                                <div class="fw-bold text-navy">{{ number_format($item->available_capacity_ton, 0, ',', '.') }}</div>
                                <div class="meta-text">tCO2e</div>
                            </td>
                            <td>
                                <div class="mb-1">
                                    <span class="meta-text">Penjualan:</span>
                                    <span class="fw-semibold text-navy ftc-green">{{ number_format(($item->total_capacity_ton - $item->available_capacity_ton), 0, ',', '.') }} tCO2e</span>
                                </div>
                                <div class="mb-1">
                                    <span class="meta-text">Kunjungan:</span>
                                    <span class="fw-semibold text-navy">{{ format_angka_singkat($item->projectviews) }}</span>
                                </div>
                            </td>
                            <td>
                                <button class="btn fw-bold btn-sm bdc-green" data-bs-target="#ubahModal"
                                    onclick="showProjectUpdate(this)"  
                                    data-url="{{ route('seller.project.ubah', $item->project_id) }}">
                                    Ubah
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
    @include('Seller.Content.Proyek.tdproyek')
    <script src="{{ asset('js/seller/proyek/UpdateProyek.js') }}"></script>
    <script src="{{ asset('js/seller/proyek/Proyek.js') }}"></script>
@endsection
@push('scripts')
@endpush