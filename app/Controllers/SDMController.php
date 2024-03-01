<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employees;

class SDMController extends BaseController
{
    public function index()
    {
        $employeesModel = new Employees;
        $data['employees'] = $employeesModel->orderBy('employee_id', 'ASC')->findAll();
        $title['title'] = "Data Karyawan - SDM";
        return view ('pages/sdm/index', ['title' => $title, 'data' => $data]);
    }

    public function insert()
    {
        $title['title'] = "Tambah Data Karyawan - SDM";
        return view ('pages/sdm/insert', ['title' => $title]);
    }

    public function gaji()
    {
        $title['title'] = "Perhitungan Gaji - SDM";
        return view ('pages/sdm/gaji', ['title' => $title]);
    }
}
