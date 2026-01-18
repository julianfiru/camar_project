<?php

namespace App\Http\Controllers\Seller\Penjualan;

use App\Http\Controllers\Seller\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanSeller extends Controller
{
    public function index()
    {
        return view('Seller.Content.Penjualan.penjualan', [
            'categories'      => $this->categories,
            'totalProyek'      => $this->totalProyek,
            'totalAktif'      => $this->totalAktif,
            'totalPending'        => $this->totalPending,
            'totalBatal'  => $this->totalBatal,
            'projects'  => $this->proyek,
        ]);
    }
}
