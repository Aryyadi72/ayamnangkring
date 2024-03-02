<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];

    public function indexGallery()
    {
        $title['title'] = "Gallery View - Produk";
        $produkModel = new ProdukModel();
        $produk['produk'] = $produkModel->findAll();
        // return $this->response->setJSON(['status' => 'success', 'message' => 'Produk Berhasil Ditampilkan!', 'data' => $produk]);
        return view('pages/produk/gallery-view', ['title' => $title, 'produk' => $produk]);
    }

    public function indexTable()
    {
        $title['title'] = "Table View - Produk";
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();
        // return $this->response->setJSON(['status' => 'success', 'message' => 'Produk Berhasil Ditampilkan!', 'data' => $produk]);
        return view('pages/produk/index', ['title' => $title, 'produk' => $produk]);
    }

    public function create()
    {
        $title['title'] = "Tambah - Produk";
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();
        // return $this->response->setJSON(['status' => 'success', 'message' => 'Produk Berhasil Ditampilkan!', 'data' => $produk]);
        return view('pages/produk/create', ['title' => $title]);
    }

    public function store()
    {

        $data['title'] = 'Tambah Produk';

        $produk = new ProdukModel();

        $validationRules = [
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]',
        ];

        if ($this->validate($validationRules)) {
            $image = $this->request->getFile('image');

            if ($image->isValid() && !$image->hasMoved()) {
                $image->move(ROOTPATH . 'public/uploads/produk');

                $imageName = $image->getName();
            }

            $dataToAdd = [
                'name' => $this->request->getPost('name'),
                'qty' => $this->request->getPost('qty'),
                'price' => $this->request->getPost('price'),
                'image' => isset($imageName) ? $imageName : null,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $produk->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Berhasil disimpan!");
                return redirect()->to(base_url('produk/produk-table'));
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
        $model = new ProdukModel();
        $data['product'] = $model->getProductById($id);
        $title['title'] = "Edit - Produk";

        return view('pages/produk/edit', ['title' => $title, 'data' => $data]);
    }

    public function update($id)
    {
        $data['title'] = 'Update Produk';

        $produk = new ProdukModel();

        $validationRules = [
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $dataToUpdate = [
                'name' => $this->request->getPost('name'),
                'qty' => $this->request->getPost('qty'),
                'price' => $this->request->getPost('price'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $result = $produk->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Produk berhasil diupdate!");
                return redirect()->to(base_url('produk/produk-table'));
            } else {
                session()->setFlashdata("error", "Data gagal diupdate.");
                return redirect()->back();
            }
        } else {
            session()->setFlashdata("error", "Data gagal diupdate.");
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $model = new ProdukModel();

        $product = $model->find($id);

        if ($product) {
            $model->delete($id);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

}

