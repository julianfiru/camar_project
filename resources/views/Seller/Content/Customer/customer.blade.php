@extends('Seller.layout.app')
@section('title', 'CAMAR - Customer')
@section('page-title', 'Aktivasi Layanan')
@section('page-subtitle', 'Cek progres status pelanggan')
@section('content')

    <div class="bs mb-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap gap-3">
                <button class="btn fw-bold btn-sm bdc-green active" data-filter="all">Semua ({{ count($riwayatTransaksi) }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="active">Selesai ({{ $riwayatTransaksi->where('order_status', 2)->count() }})</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="pending">Proses {{ $riwayatTransaksi->where('order_status', 1)->count() }}</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="cancelled">Dibatalkan ({{ $riwayatTransaksi->where('order_status', 0)->count() }})</button>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm mb-4 bs">
        <div class="bg-transparent border-0 d-flex justify-content-between align-items-center py-3">
            <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                <h5 class="fw-bold mb-0 stat-value">Riwayat Transaksi</h5>
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
                        @forelse($riwayatTransaksi as $transaction)
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
@endsection