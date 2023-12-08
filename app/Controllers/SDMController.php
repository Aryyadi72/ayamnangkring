<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SDMController extends BaseController
{
    public function index()
    {
        $title['title'] = "Data Karyawan - SDM";
        return view ('pages/sdm/index', $title);
    }

    public function insert()
    {
        $title['title'] = "Tambah Data Karyawan - SDM";
        return view ('pages/sdm/insert', $title);
    }

    public function gaji()
    {
        $title['title'] = "Perhitungan Gaji - SDM";
        return view ('pages/sdm/gaji', $title);
    }
}
