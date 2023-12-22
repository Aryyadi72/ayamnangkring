<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transactions;

class TransaksiController extends BaseController
{
    public function index()
    {
        $transactionsModel = new Transactions;
        $data['transactions'] = $transactionsModel->getTransactionComplete();
        $title ['title'] = "Transaksi - Page";
        return view ('/pages/transaksi/index', ['title' => $title, 'data' => $data]);
    }
}
