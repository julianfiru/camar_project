<?php

namespace App\Http\Controllers\Seller\Profil;

use App\Http\Controllers\Seller\Controller;

class ProfilSeller extends Controller
{
    public function index()
    {
        return view('Seller.Content.Profil.profil', [
            'profil'      => $this->profil,
            'email'      => $this->user,
            'bank'        => $this->bank,
            'document'  => $this->document,
            'totalAktif'  => $this->totalAktif,
            'statusSeller'  => $this->statusSeller,
            'statusStyle'  => $this->statusStyleSeller,
            'riwayatTransaksi'  => $this->riwayatTransaksi,
        ]);
    }
}
