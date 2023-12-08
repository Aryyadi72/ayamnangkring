<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProdukController extends BaseController
{
    public function indexGallery()
    {
        $title['title'] = "Gallery View - Produk";
        return view ('pages/produk/gallery-view', $title);
    }

    public function indexTable()
    {
        $title['title'] = "Table View - Produk";
        return view ('pages/produk/index', $title);
    }

    public function insert()
    {
        $title['title'] = "Tambah - Produk";
        return view ('pages/produk/insert', $title);
    }
}
