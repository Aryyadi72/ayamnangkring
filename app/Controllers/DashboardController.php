<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionDetailsModel;

class DashboardController extends BaseController
{
    protected $filters = ['auth'];
    // Function untuk menampilkan halaman dashboard admin
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();

        if (!$this->session->has('user_id')) {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        $title['title'] = "Dashboard - Page";

        // Fetch sum data
        $transactionDetailModel = new TransactionDetailsModel();
        $sumQty = $transactionDetailModel->selectSum('quantity')->get()->getRow()->quantity;

        // Pass the sum data to the view
        $data['quantity'] = $sumQty;

        return view('pages/dashboard/index', [
            'title' => $title,
            'quantity' => $sumQty,
        ]);
    }
}
