<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Products;

class ProdukController extends BaseController
{
    public function indexGallery()
    {
        $title['title'] = "Gallery View - Produk";
        return view ('pages/produk/gallery-view', ['title' => $title]);
    }

    public function indexTable()
    {
        $productsModel = new Products;
        $data['products'] = $productsModel->orderBy('products_id', 'ASC')->findAll();
        $title['title'] = "Table View - Produk";
        return view ('pages/produk/index', ['title' => $title, 'data' => $data]);
    }

    public function insert()
    {
        $title['title'] = "Tambah - Produk";
        return view ('pages/produk/insert', ['title' => $title]);
    }
}
