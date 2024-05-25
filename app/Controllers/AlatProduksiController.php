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
        $alatProduksi['alat'] = $alatProduksiModel->orderBy('created_at', 'DESC')->findAll();
        return view('pages/inventory/alat-produksi/index', ['title' => $title, 'alatProduksi' => $alatProduksi]);
    }

    public function create()
    {
        $title['title'] = "Data Alat Produksi - Alat Produksi";
        return view('pages/inventory/alat-produksi/create', ['title' => $title]);
    }

    public function store()
    {
        $alatProduksiModel = new AlatProduksiModel();

        $kode = $this->request->getPost('kode');

        $existingData = $alatProduksiModel->where('kode', $kode)->first();
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
            'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]',
            'qty' => 'required|integer',
            'satuan' => 'required|in_list[PCS,UNIT,BUAH]',
            'status' => 'required|in_list[LAYAK PAKAI,TIDAK LAYAK,RUSAK]',
            'harga' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $image = $this->request->getFile('image');

            if ($image->isValid() && !$image->hasMoved()) {
                $image->move(ROOTPATH . 'public/uploads/alat_produksi');

                $imageName = $image->getName();
            }

            $dataToAdd = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'qty' => $this->request->getPost('qty'),
                'harga' => $harga_formatted1,
                'image' => isset($imageName) ? $imageName : null,
                'created_at' => date('Y-m-d H:i:s'),
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

    public function update()
    {
        $alatProduksiModel = new AlatProduksiModel();

        $harga = $this->request->getPost('harga');
        $harga_formatted = str_replace('Rp. ', '', $harga);
        $harga_formatted1 = str_replace('.', '', $harga_formatted);

        $id = $this->request->getPost('id');
        $kodeAlatProduksi = $this->request->getPost('kode');
        $hargaAlatProduksi = $harga_formatted1;
        $namaAlatProduksi = $this->request->getPost('nama');
        $qtyAlatProduksi = $this->request->getPost('qty');
        $satuanAlatProduksi = $this->request->getPost('satuan');
        $statusAlatProduksi = $this->request->getPost('status');

        $imageAlatProduksi = $this->request->getFile('image');

        if ($imageAlatProduksi->isValid() && !$imageAlatProduksi->hasMoved()) {
            $filename = $imageAlatProduksi->getRandomName();
            $imageAlatProduksi->move(ROOTPATH . 'public/uploads/alat_produksi', $filename);

            $updatedData = [
                'kode' => $kodeAlatProduksi,
                'nama' => $namaAlatProduksi,
                'qty' => $qtyAlatProduksi,
                'harga' => $hargaAlatProduksi,
                'satuan' => $satuanAlatProduksi,
                'status' => $statusAlatProduksi,
                'image' => $filename,
            ];
        } else {
            $updatedData = [
                'kode' => $kodeAlatProduksi,
                'nama' => $namaAlatProduksi,
                'qty' => $qtyAlatProduksi,
                'harga' => $hargaAlatProduksi,
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
