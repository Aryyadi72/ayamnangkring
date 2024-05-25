<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahanPenunjangModel;

class BahanPenunjangController extends BaseController
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
        $title['title'] = "Data Bahan Penunjang - Bahan Penunjang";
        $bahanPenunjangModel = new BahanPenunjangModel;
        $bahanPenunjang['bahan'] = $bahanPenunjangModel->orderBy('created_at', 'DESC')->findAll();
        return view('pages/inventory/bahan-penunjang/index', ['title' => $title, 'bahanPenunjang' => $bahanPenunjang]);
    }

    public function create()
    {
        $title['title'] = "Data Bahan Penunjang - Bahan Penunjang";
        return view('pages/inventory/bahan-penunjang/create', ['title' => $title]);
    }

    public function store()
    {
        $bahanPenunjangModel = new BahanPenunjangModel();

        $kode = $this->request->getPost('kode');

        $existingData = $bahanPenunjangModel->where('kode', $kode)->first();
        if ($existingData) {
            session()->setFlashdata("error", "Data dengan kode yang sama sudah ada dalam database!!!");
            return redirect()->back();
        }

        $harga = $this->request->getPost('harga');
        $harga_formatted = str_replace('Rp. ', '', $harga);
        $harga_formatted1 = str_replace('.', '', $harga_formatted);

        $validationRules = [
            'kode' => 'required|max_length[255]',
            'nama' => 'required|max_length[255]',
            'qty' => 'required|integer',
            'satuan' => 'required|in_list[PCS,CUP,PACK]',
            'kategori' => 'required|in_list[HABIS PAKAI,SEMI PERMANEN,PERMANEN]',
            'harga' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'qty' => $this->request->getPost('qty'),
                'satuan' => $this->request->getPost('satuan'),
                'kategori' => $this->request->getPost('kategori'),
                'harga' => $harga_formatted1,
                'created_at' => date('Y-m-d H:i:s'),
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

    public function edit($id)
    {
        $title['title'] = "Ubah Bahan Penunjang - Bahan Penunjang";
        $bahanPenunjangModel = new BahanPenunjangModel;
        $bahanPenunjang['bahan'] = $bahanPenunjangModel->getBahanPenunjangById($id);
        return view('pages/inventory/bahan-penunjang/edit', ['title' => $title, 'bahanPenunjang' => $bahanPenunjang]);
    }

    public function update($id)
    {
        $bahanPenunjangModel = new BahanPenunjangModel();

        $harga = $this->request->getPost('harga');
        $harga_formatted = str_replace('Rp. ', '', $harga);
        $harga_formatted1 = str_replace('.', '', $harga_formatted);

        $validationRules = [
            'kode' => 'required|max_length[255]',
            'nama' => 'required|max_length[255]',
            'qty' => 'required|integer',
            'satuan' => 'required|in_list[PCS,CUP,PACK]',
            'kategori' => 'required|in_list[HABIS PAKAI,SEMI PERMANEN,PERMANEN]',
            'harga' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $existingData = $bahanPenunjangModel->find($id);

            if (!$existingData) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
            }

            $dataToUpdate = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'qty' => $this->request->getPost('qty'),
                'satuan' => $this->request->getPost('satuan'),
                'kategori' => $this->request->getPost('kategori'),
                'harga' => $harga_formatted1,
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
