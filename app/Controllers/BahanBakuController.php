<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BahanBakuController extends BaseController
{
    public function masuk()
    {
        $title['title'] = "Pengadaan Masuk - Bahan Baku";
        return view ('pages/bahan-baku/masuk', ['title' => $title]);
    }

    public function keluar()
    {
        $title['title'] = "Pengadaan Keluar - Bahan Baku";
        return view ('pages/bahan-baku/keluar', ['title' => $title]);
    }
}
