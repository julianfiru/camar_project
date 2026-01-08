<?php

namespace App\Http\Controllers\Seller;

use App\Models\Seller\Order;
use App\Models\Seller\Payment;
use App\Models\Seller\ProjectCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $user;

    // Proyek
        protected $proyek;
        protected $statusStyleProyek;
        protected $statusLabelProyek;
        protected $totalAktif;
        protected $totalPending;
        protected $totalBatal;
        protected $totalProyek;
        protected $carbonCredit;
        protected $carbonTotal;
        protected $categories;
    // Proyek

    // Penjualan
        protected $totalPenjualan;
        protected $penjualanBulanan;
        protected $panahJualPersentaseBulanan;
        protected $warnaJualPersentaseBulanan;
        protected $persentaseJualKenaikanBulanan;
        protected $penjualanTahunan;
        protected $panahJualPersentaseTahunan;
        protected $warnaJualPersentaseTahunan;
        protected $persentaseJualKenaikanTahunan;
    // Penjualan

    // Transaksi
        protected $riwayatTransaksi;
        protected $transaksiTahunan;
        protected $persentaseTransaksiKenaikanTahunan;
        protected $panahTransaksiPersentaseTahunan;
        protected $warnaTransaksiPersentaseTahunan;
    // Transaksi

    // Profil
        protected $profil; 
        protected $bank; 
        protected $document; 
        protected $statusSeller; 
        protected $statusStyleSeller;
    // Profil

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->user = Auth::user();
                $projectIds = $this->user->seller->projects->pluck('project_id');
                // Proyek
                    $this->categories = ProjectCategory::all();
                    $this->proyek = $this->user->seller->projects;
                    $this->totalAktif = $this->user->seller->projects()
                         ->where('status', 2)
                         ->count();
                    $this->totalPending = $this->user->seller->projects()
                         ->where('status', 1)
                         ->count();
                    $this->totalBatal = $this->user->seller->projects()
                         ->where('status', 0)
                         ->count();
                    $this->totalProyek = $this->user->seller->projects()
                         ->count();
                    $this->carbonCredit = $this->user->seller->projects()
                        ->sum('available_capacity_ton');
                    $this->carbonTotal = Order::whereIn('project_id', $projectIds)
                        ->where('order_status', 2)
                        ->sum('offset_amount_ton');
                // Proyek

                // Penjualan
                    $this->totalPenjualan = Payment::whereHas('order', function ($query) use ($projectIds) {
                            $query->whereIn('project_id', $projectIds);
                            $query->where('order_status', 2);
                        })
                        ->where('payment_status', 2)
                        ->sum('amount');
                    $this->penjualanBulanan = Order::join('projects', 'offset_orders.project_id', '=', 'projects.project_id')
                        ->whereIn('offset_orders.project_id', $projectIds)
                        ->where('offset_orders.order_status', 2) 
                        ->whereMonth('offset_orders.created_at', now()->month)
                        ->whereYear('offset_orders.created_at', now()->year)
                        ->sum(DB::raw('offset_orders.offset_amount_ton * projects.price'));
                    $penjualanBulanLalu = Order::join('projects', 'offset_orders.project_id', '=', 'projects.project_id')
                        ->whereIn('offset_orders.project_id', $projectIds)
                        ->where('offset_orders.order_status', 2)
                        ->whereMonth('offset_orders.created_at', now()->subMonth()->month)
                        ->whereYear('offset_orders.created_at', now()->subMonth()->year)
                        ->sum(DB::raw('offset_orders.offset_amount_ton * projects.price'));
                    if ($penjualanBulanLalu > 0) {
                        $this->persentaseJualKenaikanBulanan = (($this->penjualanBulanan - $penjualanBulanLalu) / $penjualanBulanLalu) * 100;
                    } else {
                        $this->persentaseJualKenaikanBulanan = $this->penjualanBulanan > 0 ? 100 : 0;
                    }
                    $isNaikBulanan = $this->persentaseJualKenaikanBulanan >= 0;
                    $this->panahJualPersentaseBulanan = $isNaikBulanan ? '↑' : '↓';
                    $this->warnaJualPersentaseBulanan = $isNaikBulanan ? 'ftc-green' : 'ftc-red';
                    $this->penjualanTahunan = Order::join('projects', 'offset_orders.project_id', '=', 'projects.project_id')
                        ->whereIn('offset_orders.project_id', $projectIds)
                        ->where('offset_orders.order_status', 2)
                        ->whereYear('offset_orders.created_at', now()->year)
                        ->sum(DB::raw('offset_orders.offset_amount_ton * projects.price'));
                    $penjualanTahunLalu = Order::join('projects', 'offset_orders.project_id', '=', 'projects.project_id')
                        ->whereIn('offset_orders.project_id', $projectIds)
                        ->where('offset_orders.order_status', 2)
                        ->whereYear('offset_orders.created_at', now()->subYear()->year)
                        ->sum(DB::raw('offset_orders.offset_amount_ton * projects.price'));
                    if ($penjualanTahunLalu > 0) {
                        $this->persentaseJualKenaikanTahunan = (($this->penjualanTahunan - $penjualanTahunLalu) / $penjualanTahunLalu) * 100;
                    } else {
                        $this->persentaseJualKenaikanTahunan = $this->penjualanTahunan > 0 ? 100 : 0;
                    }
                    $isNaikTahunan = $this->persentaseJualKenaikanTahunan >= 0;
                    $this->panahJualPersentaseTahunan = $isNaikTahunan ? '↑' : '↓';
                    $this->warnaJualPersentaseTahunan = $isNaikTahunan ? 'ftc-green' : 'ftc-red';
                // Penjualan

                // Transaksi
                    $this->riwayatTransaksi = Order::with(['project', 'buyer'])
                        ->whereIn('project_id', $projectIds)
                        ->latest()
                        ->get();
                    $this->transaksiTahunan = Order::whereIn('project_id', $projectIds)
                        ->where('order_status', 2)
                        ->whereYear('created_at', now()->year)
                        ->count();
                    $transaksiBulanLalu = Order::whereIn('project_id', $projectIds)
                        ->where('order_status', 2)
                        ->whereYear('created_at', now()->subMonth()->year)
                        ->count();
                    if ($transaksiBulanLalu > 0) {
                        $this->persentaseTransaksiKenaikanTahunan = (($this->transaksiTahunan - $transaksiBulanLalu) / $transaksiBulanLalu) * 100;
                    } else {
                        $this->persentaseTransaksiKenaikanTahunan = $this->transaksiTahunan > 0 ? 100 : 0;
                    }
                    $isNaikTransaksi = $this->persentaseTransaksiKenaikanTahunan >= 0;
                    $this->panahTransaksiPersentaseTahunan = $isNaikTransaksi ? '↑' : '↓';
                    $this->warnaTransaksiPersentaseTahunan = $isNaikTransaksi ? 'ftc-green' : 'ftc-red';
                // Transaksi

                // Profil
                    $this->profil = $this->user->seller;
                    $this->bank = $this->profil->bank;
                    $this->document = $this->profil->documentsSeller;
                    if ($this->profil && $this->profil->verified_at) {
                        $tanggalVerifikasi = \Carbon\Carbon::parse($this->profil->verified_at);
                        $tanggalKadaluarsa = $tanggalVerifikasi->copy()->addMonth(); 
                        if (now()->greaterThan($tanggalKadaluarsa)) {
                            $this->statusSeller = 'Kadaluarsa';
                            $this->statusStyleSeller = 'bgc-red';
                        } else {
                            $this->statusSeller = 'Terverifikasi';
                            $this->statusStyleSeller = 'bgc-green';
                        }
                    } else {
                        $this->statusSeller = 'Belum Terverifikasi';
                        $this->statusStyleSeller = 'bgc-red';
                    }
                // Profil

                // Performa
                // Performa
            }
            return $next($request);
        });
    }
}