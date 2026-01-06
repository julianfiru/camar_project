<?php

namespace App\Http\Controllers\Seller\Customer;

use App\Http\Controllers\Seller\Controller;
use Illuminate\Http\Request;

class CustomerSeller extends Controller
{
    public function index()
    {
        return view('Seller.Content.Customer.customer', [
            'riwayatTransaksi'  => $this->riwayatTransaksi,
        ]);
    }
}
