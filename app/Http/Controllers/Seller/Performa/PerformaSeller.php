<?php

namespace App\Http\Controllers\Seller\Performa;

use App\Http\Controllers\Seller\Controller;
use Carbon\Carbon;
use App\Models\Seller\Order;

class PerformaSeller extends Controller
{
    public function index()
    {

        $labels = [];
        $this->penjualanBulanan = [];
        $now = Carbon::now();
        $projectIds = $this->user->seller->projects->pluck('project_id');

        for ($i = 5; $i >= 0; $i--) {
            $date = $now->copy()->subMonths($i);
            $monthKey = $date->format('Y-m');
            $monthName = $date->translatedFormat('M');
            
            $labels[$monthKey] = [
                'name' => $monthName,
                'total' => 0, // Default 0
                'date_obj' => $date 
            ];
        }
        $startDate = $now->copy()->subMonths(5)->startOfMonth();
        $endDate = $now->copy()->endOfMonth();
        $orders = Order::whereIn('project_id', $projectIds)
            ->where('order_status', 2)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
        foreach ($orders as $order) {
            $orderMonth = Carbon::parse($order->created_at)->format('Y-m');
            if (isset($labels[$orderMonth])) {
                $labels[$orderMonth]['total'] += $order->total_price; 
            }
        }
        $maxValue = collect($labels)->max('total');
        $maxValue = $maxValue == 0 ? 1 : $maxValue;
        return view('Seller.Content.Performa.performa', [
            'monthlyStats' => $labels,
            'maxChartValue' => $maxValue,
            'projects'  => $this->proyek,   
            'carbonTotal'  => $this->carbonTotal,   
            'carbonCredit'  => $this->carbonCredit,   
            'transaksiTahunan'  => $this->transaksiTahunan,
            'warnaTransaksiPersentaseTahunan'      => $this->warnaTransaksiPersentaseTahunan,
            'panahTransaksiPersentaseTahunan'      => $this->panahTransaksiPersentaseTahunan,
            'persentaseTransaksiKenaikanTahunan'      => $this->persentaseTransaksiKenaikanTahunan,
            'penjualanTahunan'  => $this->penjualanTahunan,
            'warnaJualPersentaseTahunan'      => $this->warnaJualPersentaseTahunan,
            'panahJualPersentaseTahunan'      => $this->panahJualPersentaseTahunan,
            'persentaseJualKenaikanTahunan'      => $this->persentaseJualKenaikanTahunan,
            'totalPenjualan'      => $this->totalPenjualan,
            'totalAktif'      => $this->totalAktif,
            'riwayatTransaksi'  => $this->riwayatTransaksi,
        ]);
    }
}
