@extends('Seller.layout.app')
@section('title', 'CAMAR - Performa')
@section('page-title', 'Analisis Performa')
@section('page-subtitle', 'Laporan dampak lingkungan dan progres fase proyek')
@section('content')
    <div class="row g-3 mb-4"> 
        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100"> 
                <div class="stat-header">Penjualan Tahun Ini</div>
                <div class="stat-value fs-2">Rp {{ format_angka_singkat($penjualanTahunan, 1, ',', '.') }}</div>
                <div class="{{ $warnaJualPersentaseTahunan }}">{{ $panahJualPersentaseTahunan }} {{ number_format(abs($persentaseJualKenaikanTahunan), 1) }}% dari Penjualan tahun lalu</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100">
                <div class="stat-header">Rata-rata Harga Jual</div>
                <div class="stat-value fs-2">Rp {{ format_angka_singkat($projects->avg('price')) }}</div>
                <div class="ftc-green">per tCO2e</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100">
                <div class="stat-header">Transaksi Tahun Ini</div>
                <div class="stat-value fs-2">{{ $riwayatTransaksi->filter(fn($item) => \Carbon\Carbon::parse($item->created_at)->isCurrentYear())->count() }}</div>
                <div class="{{ $warnaTransaksiPersentaseTahunan }}">{{ $panahTransaksiPersentaseTahunan }} {{ number_format(abs($persentaseTransaksiKenaikanTahunan), 1) }}% dari transaksi tahun lalu</div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="bs stat-card h-100">
                <div class="stat-header">Buyer Aktif</div>
                <div class="stat-value fs-2">{{ $riwayatTransaksi->whereIn('order_status', [2, 1])->unique('buyer_id')->count() }}</div>
                <div class="ftc-green">Perusahaan</div>
            </div>
        </div>
    </div>
    <div class="bs mb-4">
        <div class="border-0 d-flex justify-content-between align-items-center py-3">
            <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                <h5 class="fw-bold mb-0 stat-value">Dampak Lingkungan & Progres Fase Proyek</h5>
            </div>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-12 col-lg-6">
                <div class="impact-card-skin p-4 p-xl-5 text-center text-white d-flex flex-column align-items-center justify-content-center h-100 rounded-4">
                    <h3 class="fw-semibold mb-4">Total Carbon Offset</h3>
                    <div class="impact-circle-skin d-flex flex-column align-items-center justify-content-center rounded-circle mb-4">
                        @php
                            $fullString = format_angka_singkat($carbonTotal);
                            $parts = explode(' ', $fullString);
                            $angka = $parts[0]; 
                            $unit  = isset($parts[1]) ? $parts[1] : ''; 
                        @endphp
                        <span class="display-4 fw-bolder lh-1">{{ $angka }}</span>
                        <span class="small opacity-75 mt-1">{{ $unit }} tCO2e</span>
                    </div>
                    <p class="opacity-75 lh-base mb-0">
                        @php
                            $totalCarbonTon = $carbonTotal;
                            $dayaSerapPerPohon = 21.57; 
                            $jumlahPohon = ($totalCarbonTon * 1000) / $dayaSerapPerPohon;
                        @endphp
                        Setara dengan menanam <br>
                        <strong class="opacity-100">{{ format_angka_singkat($jumlahPohon) }}</strong> pohon tahun ini
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card shadow-sm border rounded-3 p-4 project-card h-100">
                    <div class="d-flex flex-column gap-4">
                        @forelse($projects as $project)
                            @php
                                $totalPhases = $project->duration_years * 2;
                                $totalTon = $project->total_capacity_ton;
                                $targetPerPhase = $totalTon / $totalPhases;
                                $totalProjectProgress = 0;
                            @endphp
                            <div class="card shadow-sm border rounded-3 p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="fw-bold fs-5 text-success">{{ $project->project_name }}</span>
                                    <span class="badge bg-body-secondary text-secondary rounded-pill px-3 py-2 fw-semibold">
                                        Estimasi: {{ $project->duration_years }} Tahun ({{ $totalPhases }} Fase)
                                    </span>
                                </div>
                                <div class="d-flex gap-1 mb-3 w-100 overflow-auto">
                                    @php
                                        $carryOver = 0; 
                                    @endphp
                                    @for($i = 1; $i <= $totalPhases; $i++)
                                    @php
                                        $projectStart   = \Carbon\Carbon::parse($project->created_at);
                                        $phaseStartDate = $projectStart->copy()->addMonths(($i - 1) * 6);
                                        $phaseEndDate   = $phaseStartDate->copy()->addMonths(6);
                                        $now            = now();
                                        $isFuture       = $now < $phaseStartDate;
                                        $isPast         = $now > $phaseEndDate;
                                        $currentPhaseRaw = 0;
                                        if (!$isFuture) {
                                            $currentPhaseRaw = $riwayatTransaksi
                                                ->where('project_id', $project->project_id)
                                                ->where('order_status', 2)
                                                ->filter(function ($item) use ($phaseStartDate, $phaseEndDate) {
                                                    return \Carbon\Carbon::parse($item->created_at)
                                                        ->between($phaseStartDate, $phaseEndDate);
                                                })
                                                ->sum('offset_amount_ton');
                                        }
                                        $totalProjectProgress += $currentPhaseRaw;
                                        $availableForPhase = $currentPhaseRaw + $carryOver;
                                        if ($availableForPhase >= $targetPerPhase) {
                                            $isTargetReached = true;
                                            $carryOver = $availableForPhase - $targetPerPhase;
                                            $displayVolume = $targetPerPhase; 
                                        } else {
                                            $isTargetReached = false;
                                            $carryOver = 0; 
                                            $displayVolume = $availableForPhase;
                                        }
                                        $status      = 'bg-light text-muted';
                                        $borderClass = 'border-light';
                                        $textClass   = '';
                                        if ($isTargetReached) {
                                            $status      = 'bg-success-subtle';
                                            $borderClass = 'border-success';
                                            $textClass   = 'text-success-emphasis';
                                        } else {
                                            // Jika belum tercapai
                                            if ($isFuture) {
                                                $status      = 'bg-light text-muted';
                                                $borderClass = 'border-light';
                                            } elseif ($isPast) {
                                                $status      = 'bg-danger-subtle';
                                                $borderClass = 'border-danger';
                                                $textClass   = 'text-danger';
                                            } else {
                                                $status      = 'bg-warning-subtle';
                                                $borderClass = 'border-warning';
                                                $textClass   = 'text-warning-emphasis';
                                            }
                                        }
                                    @endphp
                                        <div class="phase-box flex-fill border rounded p-2 text-center {{ $status }} {{ $borderClass }} {{ $textClass }}" style="min-width: 80px;">
                                            <small class="d-block fw-bold text-uppercase opacity-75 mb-1" style="font-size: 0.65rem;">
                                                Fase {{ $i }}
                                            </small>
                                            <div class="fw-bold fs-6 lh-1">
                                                {{ $isFuture ? '-' : number_format($availableForPhase, 0, ',', '.') }}
                                            </div>
                                            <div class="opacity-75" style="font-size: 0.65rem;">
                                                / {{ number_format($targetPerPhase, 0, ',', '.') }} t
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <div class="d-flex justify-content-end align-items-center small">
                                    <span class="text-muted me-2">Total Terlaksana:</span>
                                    <span class="fw-bold text-dark">
                                        {{ number_format($totalProjectProgress, 0, ',', '.') }} / {{ $totalTon }} ton
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">Belum ada data proyek.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bs mb-4">
        <div class="border-0 d-flex justify-content-between align-items-center py-3">
            <div class="d-flex justify-content-between align-items-center w-100 pb-3 border-bottom border-2">    
                <h2 class="fw-bold mb-0 stat-value">Tren Penjualan (6 Bulan Terakhir)</h5>
                <select class="form-input stat-value w-auto">
                    <option class="stat-value">Pendapatan (IDR)</option>
                    <option class="stat-value">Volume (tCO2e)</option>
                </select>
            </div>
        </div>
        <div class="d-flex align-items-end justify-content-between position-relative pt-4 pb-0 gap-3 border-bottom border-2" 
            style="height: 300px; border-color: var(--border) !important;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-between pe-none z-n1 pb-1">
                <div class="border-top border-secondary opacity-25 dashed-line"></div>
                <div class="border-top border-secondary opacity-25 dashed-line"></div>
                <div class="border-top border-secondary opacity-25 dashed-line"></div>
                <div class="border-top border-secondary opacity-25 dashed-line"></div>
                <div class="border-top border-secondary opacity-25 dashed-line"></div>
            </div>
            @foreach($monthlyStats as $stat)
                @php
                    $heightPercent = ($stat['total'] / $maxChartValue) * 85;
                    if($heightPercent < 1) $heightPercent = 1;
                    $barColor = '';
                    if ($stat['total'] == $maxChartValue && $stat['total'] > 0) {
                        $barColor = 'background-color: var(--green) !important;'; 
                    } elseif ($stat['total'] > 0 && $stat['total'] < ($maxChartValue * 0.3)) {
                        $barColor = 'background-color: var(--red) !important;';
                    }
                @endphp

                <div class="d-flex flex-column align-items-center justify-content-end h-100 flex-fill position-relative tooltip-container">
                    <div class="chart-bar w-100 rounded-top" 
                        style="height: {{ $heightPercent }}%; {{ $barColor }}" 
                        data-val="{{ format_angka_singkat($stat['total']) }}"
                        title="Rp {{ format_angka_singkat($stat['total'], 0, ',', '.') }}"> </div>
                    <div class="small mt-2 text-secondary">{{ $stat['name'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('scripts')
@endpush