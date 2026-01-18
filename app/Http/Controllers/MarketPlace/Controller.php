<?php

namespace App\Http\Controllers\MarketPlace; // Pastikan namespace benar

use App\Http\Controllers\Controller as BaseController;
use App\Models\Seller\Project;

class Controller extends BaseController
{
    protected $proyek;

    public function __construct()
    {
        $this->proyek = Project::with(['category', 'seller'])->get();
    }
}