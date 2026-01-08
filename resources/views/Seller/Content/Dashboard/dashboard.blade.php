@extends('Seller.layout.app')
@section('title', 'CAMAR - Dashboard')
@section('page-title', 'Dashboard Seller')
@section('page-subtitle', 'Selamat datang kembali! 👋')
@section('content')
        <div class="row g-4 mb-4"> 
            <div class="col-12 col-md-6 col-xl-3">
                <div class="bs stat-card h-100"> 
                    <div class="stat-header">Total Proyek Aktif</div>
                    <div class="stat-value fs-2">{{ $totalAktif }}</div>
                    <div class="ftc-green">↑ {{ $projects->where('status', 2)->filter(fn($p) => \Carbon\Carbon::parse($p->created_at)->year == now()->year)->count() }} proyek baru</div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="bs stat-card h-100">
                    <div class="stat-header">Total Carbon Credit</div>
                    <div class="stat-value fs-2">{{ $carbonCredit }}</div>
                    <div class="ftc-green">tCO2e tersedia</div>
                </div>
            </div>
            
            <div class="col-12 col-md-6 col-xl-3">
                <div class="bs stat-card h-100">
                    <div class="stat-header">Penjualan Bulan Ini</div>
                    <div class="stat-value fs-2">Rp {{ format_angka_singkat($penjualanBulanan, 1, ',', '.') }}</div>
                    <div class="{{ $warnaJualPersentaseBulanan }}">{{ $panahJualPersentaseBulanan }} {{ number_format(abs($persentaseJualKenaikanBulanan), 1) }}% dari Penjualan bulan lalu</div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="bs stat-card h-100">
                    <div class="stat-header">Status Verifikasi</div>
                    <div class="mb-2">
                        <span class="badge rounded-pill px-3 py-2 {{ $statusStyle }}" >{{ $statusSeller }}</span>
                    </div>
                    <div class="ftc-green">Berlaku hingga {{ \Carbon\Carbon::parse($profil->verified_at)->addMonth()->translatedFormat('F Y') }}</div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4 bs">
            <div class="border-0 d-flex justify-content-between align-items-center py-3">
                <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                    <h5 class="fw-bold mb-0 stat-value">Proyek Carbon Offset Terbaru</h5>
                    <button class="btn text-white basefont fw-bold btn-sm px-3 bgc-green">
                        + Tambah Proyek
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="ps-4">Nama Proyek</th>
                                <th>Lokasi</th>
                                <th>Total Credit</th>
                                <th>Tersedia</th>
                                <th>Harga/tCO2e</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects->take(3) as $item)
                                <tr>
                                    <td class="fw-bold text-center">{{ $item->project_name }}</td>
                                    <td class="text-center">
                                        {{ $item->location }} 
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($item->total_capacity_ton, 0, ',', '.') }} tCO2e
                                    </td>

                                    <td class="text-center">
                                        {{ number_format($item->available_capacity_ton, 0, ',', '.') }} tCO2e
                                    </td>

                                    <td class="text-center">
                                        Rp {{ number_format($item->price, 0, ',', '.')}} 
                                    </td>

                                    <td class="text-center pe-4 text-center">
                                        <span class="badge px-3 {{ get_status_style($item->status) }}">
                                            {{ statusProyek($item->status) }}
                                        </span>
                                    </td>

                                    <td class="text-center pe-4">
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
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4 bs">
            <div class="bg-transparent border-0 d-flex justify-content-between align-items-center py-3">
                <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                    <h5 class="fw-bold mb-0 stat-value">Riwayat Transaksi Terbaru</h5>
                    <a href="{{ route('seller.customer') }}" class="btn bdc-green fw-bold btn-sm">Lihat Semua</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="small ps-4">Tanggal</th>
                                <th scope="col" class="small">Buyer</th>
                                <th scope="col" class="small">Proyek</th>
                                <th scope="col" class="small">Jumlah</th>
                                <th scope="col" class="small">Total</th>
                                <th scope="col" class="small">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayatTransaksi->take(5) as $transaction)
                                <tr>
                                    <td class="ps-4 fw-bold">
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->translatedFormat('d M Y') }}
                                    </td>

                                    <td>
                                        {{ $transaction->buyer->company_name }}
                                    </td>

                                    <td>
                                        {{ $transaction->project->project_name }}
                                    </td>

                                    <td>
                                        {{ number_format($transaction->offset_amount_ton, 0, ',', '.') }} tCO2e
                                    </td>

                                    <td class="fw-bold text-dark">
                                        Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <span class="badge rounded-pill {{ get_status_style($transaction->order_status) }}">
                                            {{ statusProgres($transaction->order_status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        Belum ada transaksi penjualan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @include('Seller.Content.Proyek.tproyek')
    <script src="{{ asset('js/seller/proyek/DetailProyek.js') }}"></script>
@endsection