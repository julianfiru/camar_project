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
            'penjualanBulanan'        => $this->penjualanBulanan,
        ]);
    }
}
