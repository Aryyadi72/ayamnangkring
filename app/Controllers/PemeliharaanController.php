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
        $pemeliharaan['pemeliharaan'] = $pemeliharaanModel->orderBy('created_at', 'DESC')->findAll();
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

        $kode = $this->request->getPost('kode');

        $existingData = $pemeliharaanModel->where('kode', $kode)->first();
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
            'harga' => 'required',
            'jumlah' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
                'harga' => $harga_formatted1,
                'created_at' => date('Y-m-d H:i:s'),
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
            'kode' => 'required|max_length[255]',
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
                'kode' => $this->request->getPost('kode'),
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

    public function filter()
    {
        $title['title'] = "Filter Pemeliharaan - Pemeliharaan";
        return view('pages/pemeliharaan/filter', ['title' => $title]);
    }

    public function filter_proses()
    {
        $title['title'] = "Data Pemeliharaan - Filter";

        $start_periode = $this->request->getPost('start_periode');
        $end_periode = $this->request->getPost('end_periode');

        $pemeliharaanModel = new pemeliharaanModel();
        $pemeliharaan['pemeliharaan'] = $pemeliharaanModel->getFilteredData($start_periode, $end_periode);

        // Tampilkan data pengadaan masuk di view
        return view('pages/pemeliharaan/filter_result', ['title' => $title, 'pemeliharaan' => $pemeliharaan, 'start_periode' => $start_periode, 'end_periode' => $end_periode]);
    }
}
