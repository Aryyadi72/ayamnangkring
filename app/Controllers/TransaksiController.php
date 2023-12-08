<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
    public function index()
    {
        $title ['title'] = "Transaksi - Page";
        return view ('/pages/transaksi/index', $title);
    }
}
