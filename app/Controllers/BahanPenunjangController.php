<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahanPenunjangModel;

class BahanPenunjangController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];

    public function index()
    {
        $title['title'] = "Data Bahan Penunjang - Bahan Penunjang";
        $bahanPenunjangModel = new BahanPenunjangModel;
        $bahanPenunjang['bahan'] = $bahanPenunjangModel->findAll();
        return view ('pages/inventory/bahan-penunjang/index', ['title' => $title, 'bahanPenunjang' => $bahanPenunjang]);
    }

    public function create()
    {
        $title['title'] = "Data Bahan Penunjang - Bahan Penunjang";
        return view ('pages/inventory/bahan-penunjang/create', ['title' => $title]);
    }

    public function store()
    {
        $data['title'] = 'Tambah Bahan Penunjang';

        $bahanPenunjangModel = new BahanPenunjangModel();

        $validationRules = [
            'nama'     => 'required|max_length[255]',
            'qty'      => 'required|integer',
            'satuan'   => 'required|in_list[PCS,CUP,PACK]',
            'kategori' => 'required|in_list[HABIS PAKAI,SEMI PERMANEN,PERMANEN]',
            'harga'    => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'nama'     => $this->request->getPost('nama'),
                'qty'      => $this->request->getPost('qty'),
                'satuan'   => $this->request->getPost('satuan'),
                'kategori' => $this->request->getPost('kategori'),
                'harga'    => $this->request->getPost('harga'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $bahanPenunjangModel->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/bahan-penunjang'));
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
        $data['title'] = 'Edit Bahan Penunjang';

        $bahanPenunjangModel = new BahanPenunjangModel();

        $validationRules = [
            'nama'     => 'required|max_length[255]',
            'qty'      => 'required|integer',
            'satuan'   => 'required|in_list[PCS,CUP,PACK]',
            'kategori' => 'required|in_list[HABIS PAKAI,SEMI PERMANEN,PERMANEN]',
            'harga'    => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $existingData = $bahanPenunjangModel->find($id);

            if (!$existingData) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
            }

            $dataToUpdate = [
                'nama'     => $this->request->getPost('nama'),
                'qty'      => $this->request->getPost('qty'),
                'satuan'   => $this->request->getPost('satuan'),
                'kategori' => $this->request->getPost('kategori'),
                'harga'    => $this->request->getPost('harga'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $bahanPenunjangModel->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/bahan-penunjang'));
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
        $bahanPenunjangModel = new BahanPenunjangModel();

        $existingData = $bahanPenunjangModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $result = $bahanPenunjangModel->delete($id);

        if ($result) {
            session()->setFlashdata("success", "Berhasil dihapus!");
            return redirect()->back();
        } else {
            session()->setFlashdata("error", "Data gagal dihapus.");
            return redirect()->back();
        }
    }

}
