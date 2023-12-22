<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $title['title'] = "Dashboard -  Page";
        return view ('pages/dashboard/index', ['title' => $title]);
    }
}
