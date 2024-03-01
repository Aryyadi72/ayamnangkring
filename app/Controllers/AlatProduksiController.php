<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlatProduksiModel;

class AlatProduksiController extends BaseController
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
        $title['title'] = "Data Alat Produksi - Alat Produksi";
        $alatProduksiModel = new AlatProduksiModel();
        $alatProduksi['alat'] = $alatProduksiModel->findAll();
        return view('pages/inventory/alat-produksi/index', ['title' => $title, 'alatProduksi' => $alatProduksi]);
    }

    public function create()
    {
        $title['title'] = "Data Alat Produksi - Alat Produksi";
        return view('pages/inventory/alat-produksi/create', ['title' => $title]);
    }

    public function store()
    {
        $data['title'] = 'Tambah Alat Produksi';

        $alatProduksiModel = new AlatProduksiModel();

        $validationRules = [
            'nama' => 'required|max_length[255]',
            'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]',
            'qty' => 'required|integer',
            'satuan' => 'required|in_list[PCS,UNIT,BUAH]',
            'status' => 'required|in_list[LAYAK PAKAI,TIDAK LAYAK,RUSAK]',
            'harga' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $image = $this->request->getFile('image');

            if ($image->isValid() && !$image->hasMoved()) {
                $image->move(ROOTPATH . 'public/uploads/alat_produksi');

                $imageName = $image->getName();
            }

            $dataToAdd = [
                'nama' => $this->request->getPost('nama'),
                'qty' => $this->request->getPost('qty'),
                'harga' => $this->request->getPost('harga'),
                'image' => isset($imageName) ? $imageName : null,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $alatProduksiModel->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Berhasil disimpan!");
                return redirect()->to(base_url('/alat-produksi'));
            } else {
                session()->setFlashdata("error", "Data gagal ditambahkan.");
                return redirect()->back();
            }
        } else {
            session()->setFlashdata("error", "Data gagal ditambahkan.");
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $title['title'] = "Edit Alat Produksi - Alat Produksi";
        $alatProduksiModel = new AlatProduksiModel();
        $alatProduksi['alat'] = $alatProduksiModel->getAlatProduksiById($id);
        return view('pages/inventory/alat-produksi/edit', ['title' => $title, 'alatProduksi' => $alatProduksi]);
    }

    // public function update($id)
    // {
    //     $alatProduksiModel = new AlatProduksiModel();

    //     $validationRules = [
    //         'name' => 'required|max_length[255]',
    //         'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]',
    //         'qty' => 'required|integer',
    //         'satuan' => 'required|in_list[PCS,UNIT,BUAH]',
    //         'status' => 'required|in_list[LAYAK PAKAI,TIDAK LAYAK,RUSAK]',
    //         'price' => 'required|numeric',
    //     ];

    //     if ($this->validate($validationRules)) {
    //         $existingData = $alatProduksiModel->find($id);

    //         if (!$existingData) {
    //             return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
    //         }

    //         $image = $this->request->getFile('image');

    //         if ($image->isValid() && !$image->hasMoved()) {
    //             $image->move(ROOTPATH . 'public/uploads/alat_produksi');

    //             $imageName = $image->getName();
    //         }

    //         $dataToUpdate = [
    //             'name' => $this->request->getPost('name'),
    //             'qty' => $this->request->getPost('qty'),
    //             'price' => $this->request->getPost('price'),
    //             'image' => isset($imageName) ? $imageName : $existingData['image'],
    //             'updated_at' => date('Y-m-d'),
    //         ];

    //         $result = $alatProduksiModel->update($id, $dataToUpdate);

    //         if ($result) {
    //             session()->setFlashdata("success", "Berhasil diupdate!");
    //             return redirect()->to(base_url('produk/produk-table'));
    //         } else {
    //             session()->setFlashdata("error", "Data gagal diupdate.");
    //             return redirect()->back();
    //         }
    //     } else {
    //         session()->setFlashdata("error", "Data gagal diupdate.");
    //         return redirect()->back();
    //     }
    // }

    public function update()
    {
        $alatProduksiModel = new AlatProduksiModel();

        $id = $this->request->getPost('id');
        $namaAlatProduksi = $this->request->getPost('nama');
        $qtyAlatProduksi = $this->request->getPost('qty');
        $satuanAlatProduksi = $this->request->getPost('satuan');
        $statusAlatProduksi = $this->request->getPost('status');

        $imageAlatProduksi = $this->request->getFile('image');

        if ($imageAlatProduksi->isValid() && !$imageAlatProduksi->hasMoved()) {
            $filename = $imageAlatProduksi->getRandomName();
            $imageAlatProduksi->move(ROOTPATH . 'public/uploads/alat_produksi', $filename);

            $updatedData = [
                'nama' => $namaAlatProduksi,
                'qty' => $qtyAlatProduksi,
                'satuan' => $satuanAlatProduksi,
                'status' => $statusAlatProduksi,
                'image' => $filename,
            ];
        } else {
            $updatedData = [
                'nama' => $namaAlatProduksi,
                'qty' => $qtyAlatProduksi,
                'satuan' => $satuanAlatProduksi,
                'status' => $statusAlatProduksi,
            ];
        }

        $result = $alatProduksiModel->update($id, $updatedData);

        if ($result) {
            session()->setFlashdata("success", "Berhasil diupdate!");
            return redirect()->to(base_url('/alat-produksi'));
        } else {
            session()->setFlashdata("error", "Data gagal diupdate.");
            return redirect()->back();
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
            $imagePath = ROOTPATH . 'public/uploads/alat_produksi/' . $existingData['image'];
            if ($existingData['image'] && file_exists($imagePath)) {
                unlink($imagePath);
            }

            session()->setFlashdata("success", "Berhasil dihapus!");
            return redirect()->to(base_url('/alat-produksi'));
        } else {
            session()->setFlashdata("error", "Data gagal dihapus.");
            return redirect()->back();
        }
    }

}
