<?php

namespace App\Http\Controllers\MarketPlace; // Pastikan namespace benar

use App\Http\Controllers\Controller as BaseController;
use App\Models\Seller\Project;

class Controller extends BaseController
{
    // 1. Deklarasi variabel
    protected $proyek;

    public function __construct()
    {
        // 2. Jika BaseController punya construct, panggil dulu (opsional tapi disarankan)
        // parent::__construct();

        // 3. ✅ PENGISIAN DATA HARUS DI SINI (Di dalam kurung kurawal)
        $this->proyek = Project::with(['category', 'seller'])->get();
    }
}