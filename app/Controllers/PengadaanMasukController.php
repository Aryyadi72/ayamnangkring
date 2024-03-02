<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PengadaanMasukModel;

class PengadaanMasukController extends BaseController
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
        $title['title'] = "Data Bahan Baku Masuk - Pengadaan Harian";
        $PengadaanMasukModel = new PengadaanMasukModel;
        $PengadaanMasuk['pengadaanmasuk'] = $PengadaanMasukModel->findAll();
        return view('pages/pengadaan/masuk/index', ['title' => $title, 'PengadaanMasuk' => $PengadaanMasuk]);
    }

    public function create()
    {
        $title['title'] = "Tambah Bahan Baku Masuk - Pengadaan Harian";
        return view('pages/pengadaan/masuk/create', ['title' => $title]);
    }

    public function store()
    {
        $pengadaanMasukModel = new PengadaanMasukModel();

        $validationRules = [
            'nama' => 'required|max_length[255]',
            'jumlah' => 'required|integer',
            'status' => 'required|in_list[Tersedia, Sisa, Habis]',
            'jenis' => 'required|in_list[Bahan Baku, Bahan Habis Pakai]',
            'kondisi' => 'required|in_list[Rusak, Bagus]',
            'tanggal_masuk' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
                'status' => $this->request->getPost('status'),
                'jenis' => $this->request->getPost('jenis'),
                'kondisi' => $this->request->getPost('kondisi'),
                'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $pengadaanMasukModel->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/pengadaan-masuk'));
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
        $title['title'] = "Ubah Bahan Baku Masuk - Pengadaan Harian";
        $pengadaanMasukModel = new PengadaanMasukModel;
        $pengadaanMasuk['pengadaanmasuk'] = $pengadaanMasukModel->getPengadaanMasukById($id);
        return view('pages/pengadaan/masuk/edit', ['title' => $title, 'pengadaanMasuk' => $pengadaanMasuk]);
    }

    public function update($id)
    {
        $pengadaanMasukModel = new PengadaanMasukModel();

        $validationRules = [
            'nama' => 'required|max_length[255]',
            'jumlah' => 'required|integer',
            'status' => 'required|in_list[Tersedia, Sisa, Habis]',
            'jenis' => 'required|in_list[Bahan Baku, Bahan Habis Pakai]',
            'kondisi' => 'required|in_list[Rusak, Bagus]',
            'tanggal_masuk' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $existingData = $pengadaanMasukModel->find($id);

            if (!$existingData) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
            }

            $dataToUpdate = [
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
                'status' => $this->request->getPost('status'),
                'jenis' => $this->request->getPost('jenis'),
                'kondisi' => $this->request->getPost('kondisi'),
                'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $pengadaanMasukModel->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/pengadaan-masuk'));
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
        $pengadaanMasukModel = new PengadaanMasukModel();

        $existingData = $pengadaanMasukModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $result = $pengadaanMasukModel->delete($id);

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
        $title['title'] = "Filter Pengadaan Masuk - Pengadaan Masuk";
        return view('pages/pengadaan/masuk/filter', ['title' => $title]);
    }

    public function filter_proses()
    {
        $title['title'] = "Data Pengadaan Masuk - Filter";

        $start_periode = $this->request->getPost('start_periode');
        $end_periode = $this->request->getPost('end_periode');

        $pengadaanMasukModel = new PengadaanMasukModel();
        $PengadaanMasuk['pengadaanmasuk'] = $pengadaanMasukModel->getFilteredData($start_periode, $end_periode);

        // Tampilkan data pengadaan masuk di view
        return view('pages/pengadaan/masuk/filter_result', ['title' => $title, 'PengadaanMasuk' => $PengadaanMasuk, 'start_periode' => $start_periode, 'end_periode' => $end_periode]);
    }
}
