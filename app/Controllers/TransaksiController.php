<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionsModel;

class TransaksiController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];

    public function index()
    {
        $title['title'] = "Data Transaki - Transaksi";
        $transaksiModel = new TransactionsModel();
        $transaksi['transaksi'] = $transaksiModel->findAll();
        // return $this->response->setJSON(['status' => 'success', 'message' => 'Transaksi Berhasil Ditampilkan!', 'data' => $transaksi]);
        return view('/pages/transaksi/index', ['title' => $title, 'transaksi' => $transaksi]);
    }

    public function store()
    {
        $transaksiModel = new TransactionsModel();

        $validationRules = [
            'products_id' => 'required|integer',
            'service' => 'required|max_length[255]',
            'status' => 'required|max_length[50]',
            'total_price' => 'required|numeric',
            'receive_price_discount' => 'required|numeric',
            'down_payment' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'products_id' => $this->request->getPost('products_id'),
                'service' => $this->request->getPost('service'),
                'status' => $this->request->getPost('status'),
                'total_price' => $this->request->getPost('total_price'),
                'receive_price_discount' => $this->request->getPost('receive_price_discount'),
                'down_payment' => $this->request->getPost('down_payment'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $transaksiModel->insert($dataToAdd);

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
        $transaksiModel = new TransactionsModel();

        $validationRules = [
            'products_id' => 'required|integer',
            'service' => 'required|max_length[255]',
            'status' => 'required|max_length[50]',
            'total_price' => 'required|numeric',
            'receive_price_discount' => 'required|numeric',
            'down_payment' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $dataToUpdate = [
                'products_id' => $this->request->getPost('products_id'),
                'service' => $this->request->getPost('service'),
                'status' => $this->request->getPost('status'),
                'total_price' => $this->request->getPost('total_price'),
                'receive_price_discount' => $this->request->getPost('receive_price_discount'),
                'down_payment' => $this->request->getPost('down_payment'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $transaksiModel->update($id, $dataToUpdate);

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
        $transaksiModel = new TransactionsModel();

        $transaksi = $transaksiModel->find($id);

        if ($transaksi) {
            $transaksiModel->delete($id);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }

}
