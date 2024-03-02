<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PemeliharaanModel;

class PemeliharaanController extends BaseController
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
        $title['title'] = "Data Pemeliharaan - Pemeliharaan";
        $pemeliharaanModel = new PemeliharaanModel;
        $pemeliharaan['pemeliharaan'] = $pemeliharaanModel->findAll();
        return view('pages/pemeliharaan/index', ['title' => $title, 'pemeliharaan' => $pemeliharaan]);
    }

    public function create()
    {
        $title['title'] = "Data Pemeliharaan - Pemeliharaan";
        return view('pages/pemeliharaan/create', ['title' => $title]);
    }

    public function store()
    {
        $pemeliharaanModel = new PemeliharaanModel();

        $harga = $this->request->getPost('harga');
        $harga_formatted = str_replace('Rp. ', '', $harga);
        $harga_formatted1 = str_replace('.', '', $harga_formatted);

        $validationRules = [
            'nama' => 'required|max_length[255]',
            'harga' => 'required',
            'jumlah' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
                'harga' => $harga_formatted1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $pemeliharaanModel->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/pemeliharaan'));
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
        $title['title'] = "Ubah Pemeliharaan - Pemeliharaan";
        $pemeliharaanModel = new PemeliharaanModel;
        $pemeliharaan['pemeliharaan'] = $pemeliharaanModel->getPemeliharaanById($id);
        return view('pages/pemeliharaan/edit', ['title' => $title, 'pemeliharaan' => $pemeliharaan]);
    }

    public function update($id)
    {
        $pemeliharaanModel = new PemeliharaanModel();

        $harga = $this->request->getPost('harga');
        $harga_formatted = str_replace('Rp. ', '', $harga);
        $harga_formatted1 = str_replace('.', '', $harga_formatted);

        $validationRules = [
            'nama' => 'required|max_length[255]',
            'harga' => 'required',
            'jumlah' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $existingData = $pemeliharaanModel->find($id);

            if (!$existingData) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
            }

            $dataToUpdate = [
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
                'harga' => $harga_formatted1,
                'updated_at' => date('Y-m-d'),
            ];

            $result = $pemeliharaanModel->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/pemeliharaan'));
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
        $pemeliharaanModel = new PemeliharaanModel();

        $existingData = $pemeliharaanModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $result = $pemeliharaanModel->delete($id);

        if ($result) {
            session()->setFlashdata("success", "Berhasil dihapus!");
            return redirect()->back();
        } else {
            session()->setFlashdata("error", "Data gagal dihapus.");
            return redirect()->back();
        }
    }
}
