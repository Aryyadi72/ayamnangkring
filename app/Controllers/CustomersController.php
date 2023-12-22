<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomersModel;

class CustomersController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];
    
    public function index()
    {
        $title['title'] = "Data Customer - Customer";
        $customerModel = new CustomersModel();
        $customers = $customerModel->findAll();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data Berhasil Ditampilkan!', 'data' => $transaksi]);
        // return view ('/pages/transaksi/index', $title);
    }

    public function store()
    {
    $customerModel = new CustomersModel();

    $validationRules = [
        'name'            => 'required|string',
    ];

    if ($this->validate($validationRules)) {
        $dataToAdd = [
            'name'            => $this->request->getPost('name'),
            'created_at'             => date('Y-m-d'),
            'updated_at'             => date('Y-m-d'),
        ];

        $result = $customerModel->insert($dataToAdd);

        if ($result) {
            session()->setFlashdata("success", "Berhasil disimpan!");
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan!', 'data' => $dataToAdd]);
        } else {
            session()->setFlashdata("error", "Data gagal ditambahkan.");
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data gagal ditambahkan.']);
        }
    } else {
        return $this->response->setJSON(['status' => 'validation_error', 'errors' => $this->validator->getErrors()]);
    }
    }

    public function update($id)
    {
    $customerModel = new CustomersModel();

    $validationRules = [
        'name' => 'required|string',
    ];

    if ($this->validate($validationRules)) {
        $existingData = $customerModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $dataToUpdate = [
            'name' => $this->request->getPost('name'),
            'updated_at' => date('Y-m-d'),
        ];

        $result = $customerModel->update($id, $dataToUpdate);

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
    $customerModel = new CustomersModel();

    $existingData = $customerModel->find($id);

    if (!$existingData) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
    }

    $result = $customerModel->delete($id);

    if ($result) {
        session()->setFlashdata("success", "Berhasil dihapus!");
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil dihapus']);
    } else {
        session()->setFlashdata("error", "Data gagal dihapus.");
        return $this->response->setJSON(['status' => 'error', 'message' => 'Data gagal dihapus']);
    }
    }

}
