<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeesModel;

class EmployeesController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];
    
    public function index()
    {
        $title['title'] = "Data Karyawan - SDM";
        $sdmModel = new EmployeesModel();
        $sdm['employees'] = $sdmModel->findAll();
        return view ('pages/employees/index', ['title' => $title, 'sdm' => $sdm]);
    }

    public function create()
    {
        $title['title'] = "Tambah Data Karyawan - SDM";
        return view ('pages/employees/create', ['title' => $title]);
    }

    public function store()
    {
        $sdmModel = new EmployeesModel();

        $validationRules = [
            'users_id'   => 'required|integer',
            'code'       => 'required|max_length[50]',
            'name'       => 'required|max_length[255]',
            'birth_place' => 'required|max_length[100]',
            'gender'     => 'required|in_list[Male,Female]',
            'position'   => 'required|max_length[100]',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'users_id'   => $this->request->getPost('users_id'),
                'code'       => $this->request->getPost('code'),
                'name'       => $this->request->getPost('name'),
                'birth_place' => $this->request->getPost('birth_place'),
                'birth_date' => $this->request->getPost('birth_date'),
                'gender'     => $this->request->getPost('gender'),
                'position'   => $this->request->getPost('position'),
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

    public function update($id)
    {
        $sdmModel = new EmployeesModel();

        $validationRules = [
            'users_id'   => 'required|integer',
            'code'       => 'required|max_length[50]',
            'name'       => 'required|max_length[255]',
            'birth_place' => 'required|max_length[100]',
            'birth_date' => 'required|valid_date',
            'gender'     => 'required|in_list[Male,Female]',
            'position'   => 'required|max_length[100]',
        ];

        if ($this->validate($validationRules)) {
            $dataToUpdate = [
                'users_id'   => $this->request->getPost('users_id'),
                'code'       => $this->request->getPost('code'),
                'name'       => $this->request->getPost('name'),
                'birth_place' => $this->request->getPost('birth_place'),
                'birth_date' => $this->request->getPost('birth_date'),
                'gender'     => $this->request->getPost('gender'),
                'position'   => $this->request->getPost('position'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $sdmModel->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Berhasil diupdate!");
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil diupdate!', 'data' => $dataToUpdate]);
            } else {
                session()->setFlashdata("error", "Data gagal diupdate.");
                return $this->response->setJSON(['status' => 'error', 'message' => 'Data gagal diupdate.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'validation_error', 'errors' => $this->validator->getErrors()]);
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

    public function gaji()
    {
        $title['title'] = "Perhitungan Gaji - SDM";
        return view ('pages/sdm/gaji', $title);
    }
}
