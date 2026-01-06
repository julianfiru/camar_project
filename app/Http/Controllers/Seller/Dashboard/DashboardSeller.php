<?php

namespace App\Http\Controllers\Seller\Dashboard;

use App\Http\Controllers\Seller\Controller;

class DashboardSeller extends Controller
{
    public function index()
    {
        return view('Seller.Content.Dashboard.dashboard', [
            'carbonCredit'      => $this->carbonCredit,
            'profil'      => $this->profil,
            'penjualanBulanan'  => $this->penjualanBulanan,
            'warnaJualPersentaseBulanan'      => $this->warnaJualPersentaseBulanan,
            'panahJualPersentaseBulanan'      => $this->panahJualPersentaseBulanan,
            'persentaseJualKenaikanBulanan'      => $this->persentaseJualKenaikanBulanan,
            'totalAktif'        => $this->totalAktif,
            'statusSeller'  => $this->statusSeller,
            'statusStyle'  => $this->statusStyleSeller,
            'projects'  => $this->proyek,   
            'riwayatTransaksi'  => $this->riwayatTransaksi,
        ]);
    }
}
