<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlatProduksiModel;

class AlatProduksiController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];
    
    public function index()
    {
        $title['title'] = "Data Alat Produksi - Alat Produksi";
        $alatProduksiModel = new AlatProduksiModel();
        $alatProduksi = $alatProduksiModel->findAll();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Alat Produksi Berhasil Ditampilkan!', 'data' => $alatProduksi]);
    }

    public function create()
    {
        $title['title'] = "Data Alat Produksi - Alat Produksi";
        $alatProduksiModel = new AlatProduksiModel();
        $alatProduksi = $alatProduksiModel->findAll();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Alat Produksi Berhasil Ditampilkan!', 'data' => $alatProduksi]);
    }

    public function store()
    {

    $data['title'] = 'Tambah Alat Produksi';

    $alatProduksiModel = new AlatProduksiModel();

    $validationRules      = [
        'nama'   => 'required|max_length[255]',
        'image'  => 'uploaded[image]|max_size[image,4096]|is_image[image]',
        'qty'    => 'required|integer',
        'satuan' => 'required|in_list[PCS,UNIT,BUAH]',
        'status' => 'required|in_list[LAYAK PAKAI,TIDAK LAYAK,RUSAK]',
        'harga'  => 'required|numeric',
    ];

    if ($this->validate($validationRules)) {
        $image = $this->request->getFile('image');

    if ($image->isValid() && !$image->hasMoved()) {
    $image->move(ROOTPATH . 'public/uploads/alat_produksi');

    $imageName = $image->getName();
    }

        $dataToAdd = [
            'name'       => $this->request->getPost('name'),
            'qty'        => $this->request->getPost('qty'),
            'price'      => $this->request->getPost('price'),
            'image'      => isset($imageName) ? $imageName : null,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ];

        $result = $alatProduksiModel->insert($dataToAdd);

        if ($result) {
            session()->setFlashdata("success", "Berhasil disimpan!");
            return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil disimpan!', 'data' => $dataToAdd]);
            return redirect()->to(base_url('produk/produk-table'));
        } else {
            session()->setFlashdata("error", "Data gagal ditambahkan.");
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data gagal ditambahkan.']);
            return redirect()->back();
        }
    } else {
        // return redirect()->to(base_url('produk/create'))->withInput()->with('errors', $this->validator->getErrors());
        return $this->response->setJSON(['status' => 'validation_error', 'errors' => $this->validator->getErrors()]);
    }
    }

    public function update($id)
    {
    $data['title'] = 'Edit Alat Produksi';

    $alatProduksiModel = new AlatProduksiModel();

    $validationRules = [
        'name'  => 'required|max_length[255]',
        'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]',
        'qty'   => 'required|integer',
        'satuan' => 'required|in_list[PCS,UNIT,BUAH]',
        'status' => 'required|in_list[LAYAK PAKAI,TIDAK LAYAK,RUSAK]',
        'price' => 'required|numeric',
    ];

    if ($this->validate($validationRules)) {
        $existingData = $alatProduksiModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $image = $this->request->getFile('image');

        if ($image->isValid() && !$image->hasMoved()) {
            $image->move(ROOTPATH . 'public/uploads/alat_produksi');

            $imageName = $image->getName();
        }

        $dataToUpdate = [
            'name'       => $this->request->getPost('name'),
            'qty'        => $this->request->getPost('qty'),
            'price'      => $this->request->getPost('price'),
            'image'      => isset($imageName) ? $imageName : $existingData['image'],
            'updated_at' => date('Y-m-d'),
        ];

        $result = $alatProduksiModel->update($id, $dataToUpdate);

        if ($result) {
            session()->setFlashdata("success", "Berhasil diupdate!");
            return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil diupdate!', 'data' => $dataToUpdate]);
            return redirect()->to(base_url('produk/produk-table'));
        } else {
            session()->setFlashdata("error", "Data gagal diupdate.");
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data gagal diupdate.']);
            return redirect()->back();
        }
    } else {
        return $this->response->setJSON(['status' => 'validation_error', 'errors' => $this->validator->getErrors()]);
    }
    }

    public function delete($id)
{
    $alatProduksiModel = new AlatProduksiModel();

    $existingData = $alatProduksiModel->find($id);

    if (!$existingData) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
    }

    $result = $alatProduksiModel->delete($id);

    if ($result) {
        // Optionally, you may want to delete the associated image file if it exists.
        $imagePath = ROOTPATH . 'public/uploads/alat_produksi/' . $existingData['image'];
        if ($existingData['image'] && file_exists($imagePath)) {
            unlink($imagePath);
        }

        session()->setFlashdata("success", "Berhasil dihapus!");
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        return redirect()->to(base_url('produk/produk-table'));
    } else {
        session()->setFlashdata("error", "Data gagal dihapus.");
        return $this->response->setJSON(['status' => 'error', 'message' => 'Data gagal dihapus']);
        return redirect()->back();
    }
}


}
