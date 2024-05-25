<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeesModel;
use App\Models\UsersModel;

class EmployeesController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];

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
        $title['title'] = "Data Karyawan - SDM";
        $sdmModel = new EmployeesModel();
        $sdm['employees'] = $sdmModel->findAll();
        return view('pages/employees/index', ['title' => $title, 'sdm' => $sdm]);
    }

    public function create()
    {
        $title['title'] = "Tambah Data Karyawan - SDM";
        $userModel = new UsersModel();
        $user['user'] = $userModel->findAll();
        return view('pages/employees/create', ['title' => $title, 'user' => $user]);
    }

    public function store()
    {
        $sdmModel = new EmployeesModel();

        $validationRules = [
            'users_id' => 'required|integer',
            'code' => 'required|max_length[50]',
            'name' => 'required|max_length[255]',
            'birth_place' => 'required|max_length[100]',
            'gender' => 'required|in_list[Male,Female]',
            'position' => 'required|max_length[100]',
            'active' => 'required|in_list[YES,NO]',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'users_id' => $this->request->getPost('users_id'),
                'code' => $this->request->getPost('code'),
                'name' => $this->request->getPost('name'),
                'birth_place' => $this->request->getPost('birth_place'),
                'birth_date' => $this->request->getPost('birth_date'),
                'gender' => $this->request->getPost('gender'),
                'position' => $this->request->getPost('position'),
                'active' => $this->request->getPost('active'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $sdmModel->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/employees'));
            } else {
                session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
                return redirect()->back();
            }
        } else {
            session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $title['title'] = "Data Karyawan - SDM";
        $sdmModel = new EmployeesModel();
        $sdm['employees'] = $sdmModel->getEmployeesById($id);
        $userModel = new UsersModel();
        $user['user'] = $userModel->findAll();
        return view('pages/employees/edit', ['title' => $title, 'sdm' => $sdm, 'user' => $user]);
    }

    public function update($id)
    {
        $sdmModel = new EmployeesModel();

        $validationRules = [
            'users_id' => 'required|integer',
            'code' => 'required|max_length[50]',
            'name' => 'required|max_length[255]',
            'birth_place' => 'required|max_length[100]',
            'birth_date' => 'required|valid_date',
            'gender' => 'required|in_list[Male,Female]',
            'position' => 'required|max_length[100]',
            'active' => 'required|in_list[YES,NO]',
        ];

        if ($this->validate($validationRules)) {
            $dataToUpdate = [
                'users_id' => $this->request->getPost('users_id'),
                'code' => $this->request->getPost('code'),
                'name' => $this->request->getPost('name'),
                'birth_place' => $this->request->getPost('birth_place'),
                'birth_date' => $this->request->getPost('birth_date'),
                'gender' => $this->request->getPost('gender'),
                'position' => $this->request->getPost('position'),
                'active' => $this->request->getPost('active'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $sdmModel->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/employees'));
            } else {
                session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
                return redirect()->back();
            }

        } else {
            session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $sdmModel = new EmployeesModel();

        $employee = $sdmModel->find($id);

        if ($employee) {
            $sdmModel->delete($id);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
