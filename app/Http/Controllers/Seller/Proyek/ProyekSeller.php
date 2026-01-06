<?php

namespace App\Http\Controllers\Seller\Proyek;

use App\Http\Controllers\Seller\Controller;

class ProyekSeller extends Controller
{
    public function index()
    {
        return view('Seller.Content.Proyek.proyek', [
            'totalProyek'      => $this->totalProyek,
            'totalAktif'      => $this->totalAktif,
            'totalPending'        => $this->totalPending,
            'totalBatal'  => $this->totalBatal,
            'projects'  => $this->proyek,
        ]);
    }
}
