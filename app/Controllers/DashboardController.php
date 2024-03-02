<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionDetailsModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $title['title'] = "Dashboard - Page";

        // Fetch sum data
        $transactionDetailModel = new TransactionDetailsModel();
        $sumQty = $transactionDetailModel->selectSum('quantity')->get()->getRow()->quantity;

        // Pass the sum data to the view
        $data['quantity'] = $sumQty;

        return view('pages/dashboard/index', $data + $title);
    }
}
