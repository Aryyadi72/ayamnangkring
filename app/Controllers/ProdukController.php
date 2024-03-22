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
            'price' => 'required|numeric',
            // 'image' => 'uploaded[image]|max_size[image,4096]|is_image[image]',
            'category' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $image = $this->request->getFile('image');

            if ($image->isValid() && !$image->hasMoved()) {
                $image->move(ROOTPATH . 'public/uploads/produk');

                $imageName = $image->getName();
            }

            $dataToAdd = [
                'name' => $this->request->getPost('name'),
                'category' => $this->request->getPost('category'),
                'price' => $this->request->getPost('price'),
                'image' => isset ($imageName) ? $imageName : null,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            // dd($dataToAdd);

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

        $nameProduk = $this->request->getPost('name');
        $priceProduk = $this->request->getPost('price');
        $categoryProduk = $this->request->getPost('category');
        $imageProduk = $this->request->getFile('image');

        $updatedData = [
            'name' => $nameProduk,
            'price' => $priceProduk,
            'category' => $categoryProduk,
        ];

        // Check if file is uploaded
        if ($imageProduk !== null) {
            if ($imageProduk->isValid() && !$imageProduk->hasMoved()) {
                $filename = $imageProduk->getRandomName();
                $imageProduk->move(ROOTPATH . 'public/uploads/produk', $filename);

                // Add image filename to updated data
                $updatedData['image'] = $filename;
            }
        }

        $result = $produk->update($id, $updatedData);

        if ($result) {
            session()->setFlashdata("success", "Berhasil diupdate!");
            return redirect()->to(base_url('produk/produk-table'));
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

