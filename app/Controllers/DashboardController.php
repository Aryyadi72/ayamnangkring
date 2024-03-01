<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
        $title['title'] = "Dashboard -  Page";
        return view('pages/dashboard/index', ['title' => $title]);
    }
}
