<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InventoryController extends BaseController
{
    public function bahanPenunjang()
    {
        $title['title'] = "Bahan Penunjang - Inventory";
        return view ('pages/inventory/bahan-penunjang', ['title' => $title]);
    }

    public function bahanPenunjangInsert()
    {
        $title['title'] = "Tambah Bahan Penunjang - Inventory";
        return view ('pages/inventory/bahan-penunjang-add', ['title' => $title]);
    }

    public function alatProduksi()
    {
        $title['title'] = "Alat Produksi - Inventory";
        return view ('pages/inventory/alat-produksi', ['title' => $title]);
    }

    public function alatProduksiInsert()
    {
        $title['title'] = "Tambah Alat Produksi - Inventory";
        return view ('pages/inventory/alat-produksi-add', ['title' => $title]);
    }
}
