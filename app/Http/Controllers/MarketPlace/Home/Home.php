<?php

namespace App\Http\Controllers\MarketPlace\Home;

use App\Http\Controllers\MarketPlace\Controller;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        return view('MarketPlace.landing.landing', [
            'proyek'  => $this->proyek,
        ]);
    }
}
