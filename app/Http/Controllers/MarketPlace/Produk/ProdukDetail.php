<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\MarketPlace\Controller;
use App\Models\Seller\Project;
use Illuminate\Http\Request;

class ProdukDetail extends Controller
{
    public function detail($id)
    {
        $project = Project::with(['category', 'seller'])->findOrFail($id);
        return view('MarketPlace.landing.detail', [
            'project' => $project
        ]);
    }
}
