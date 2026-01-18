<?php

namespace App\Http\Controllers\MarketPlace\Proyek;

use App\Http\Controllers\MarketPlace\Controller;
use Illuminate\Http\Request;

class Proyek extends Controller
{
    public function index()
    {
        return view('MarketPlace.projects.projects', [
            'proyek'  => $this->proyek,
        ]);
    }
}
