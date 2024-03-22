<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PengadaanKeluarModel;
use App\Models\PengadaanMasukModel;

class PengadaanKeluarController extends BaseController
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
        $title['title'] = "Data Bahan Baku Keluar - Pengadaan Harian";
        $PengadaanKeluarModel = new PengadaanKeluarModel;
        $PengadaanKeluar['pengadaankeluar'] = $PengadaanKeluarModel->getPengadaanData();
        return view('pages/pengadaan/keluar/index', ['title' => $title, 'PengadaanKeluar' => $PengadaanKeluar]);
    }

    public function create($id)
    {
        $title['title'] = "Tambah Bahan Baku Keluar - Pengadaan Harian";
        $PengadaanMasukModel = new PengadaanMasukModel;
        $PengadaanKeluar['pengadaankeluar'] = $PengadaanMasukModel->getPengadaanMasukById($id);
        return view('pages/pengadaan/keluar/create', ['title' => $title, 'PengadaanKeluar' => $PengadaanKeluar]);
    }

    // public function store()
    // {
    //     $pengadaanKeluarModel = new PengadaanKeluarModel();

    //     $validationRules = [
    //         'id_pengadaan_masuk' => 'required|integer',
    //         'jumlah' => 'required|integer',
    //         'tanggal_keluar' => 'required',
    //     ];

    //     if ($this->validate($validationRules)) {
    //         $dataToAdd = [
    //             'id_pengadaan_masuk' => $this->request->getPost('id_pengadaan_masuk'),
    //             'jumlah' => $this->request->getPost('jumlah'),
    //             'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
    //             'created_at' => date('Y-m-d'),
    //             'updated_at' => date('Y-m-d'),
    //         ];

    //         $result = $pengadaanKeluarModel->insert($dataToAdd);

    //         if ($result) {
    //             session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
    //             return redirect()->to(base_url('/pengadaan-keluar'));
    //         } else {
    //             session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
    //             return redirect()->back();
    //         }
    //     } else {
    //         session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
    //         return redirect()->back();
    //     }
    // }

    // public function store()
    // {
    //     $pengadaanKeluarModel = new PengadaanKeluarModel();

    //     $validationRules = [
    //         'id_pengadaan_masuk' => 'required|integer',
    //         'jumlah' => 'required|integer',
    //         'tanggal_keluar' => 'required',
    //     ];

    //     if ($this->validate($validationRules)) {
    //         // Ambil data pengadaan masuk berdasarkan ID
    //         $id_pengadaan_masuk = $this->request->getPost('id_pengadaan_masuk');
    //         $pengadaanMasukModel = new PengadaanMasukModel();
    //         $pengadaan_masuk = $pengadaanMasukModel->find($id_pengadaan_masuk);

    //         // Pastikan pengadaan masuk ditemukan
    //         if ($pengadaan_masuk) {
    //             // Hitung jumlah yang tersisa setelah pengadaan keluar
    //             $jumlah_keluar = $this->request->getPost('jumlah');
    //             $jumlah_tersedia = $pengadaan_masuk['jumlah'] - $jumlah_keluar;

    //             // Tentukan status berdasarkan jumlah tersedia
    //             $status = ($jumlah_tersedia > 0) ? 'Sisa' : 'Habis';

    //             // Perbaharui jumlah yang tersedia di pengadaan masuk
    //             $dataToUpdate = [
    //                 'jumlah' => $jumlah_tersedia,
    //                 'status' => $status,
    //                 'updated_at' => date('Y-m-d'),
    //             ];
    //             $pengadaanMasukModel->update($id_pengadaan_masuk, $dataToUpdate);

    //             // Tambahkan data pengadaan keluar
    //             $dataToAdd = [
    //                 'id_pengadaan_masuk' => $id_pengadaan_masuk,
    //                 'jumlah' => $jumlah_keluar,
    //                 'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
    //                 'created_at' => date('Y-m-d'),
    //                 'updated_at' => date('Y-m-d'),
    //             ];
    //             $result = $pengadaanKeluarModel->insert($dataToAdd);

    //             if ($result) {
    //                 session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
    //                 return redirect()->to(base_url('/pengadaan-keluar'));
    //             } else {
    //                 session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
    //                 return redirect()->back();
    //             }
    //         } else {
    //             session()->setFlashdata("error", "Pengadaan masuk tidak ditemukan!!!");
    //             return redirect()->back();
    //         }
    //     } else {
    //         session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
    //         return redirect()->back();
    //     }
    // }

    public function store()
    {
        $pengadaanKeluarModel = new PengadaanKeluarModel();

        $validationRules = [
            'id_pengadaan_masuk' => 'required|integer',
            'jumlah' => 'required|integer',
        ];

        if ($this->validate($validationRules)) {
            // Ambil data pengadaan masuk berdasarkan ID
            $id_pengadaan_masuk = $this->request->getPost('id_pengadaan_masuk');
            $pengadaanMasukModel = new PengadaanMasukModel();
            $pengadaan_masuk = $pengadaanMasukModel->find($id_pengadaan_masuk);

            // Pastikan pengadaan masuk ditemukan
            if ($pengadaan_masuk) {
                // Hitung jumlah yang tersedia setelah pengadaan keluar
                $jumlah_keluar = $this->request->getPost('jumlah');
                $jumlah_tersedia = $pengadaan_masuk['jumlah'];

                // Periksa apakah jumlah yang diminta melebihi stok yang tersedia
                if ($jumlah_keluar <= $jumlah_tersedia) {
                    // Tentukan status berdasarkan jumlah tersedia
                    $jumlahInjury = $jumlah_tersedia - $jumlah_keluar;
                    $status = ($jumlahInjury > 0) ? 'Sisa' : 'Habis';

                    // Perbaharui jumlah yang tersedia di pengadaan masuk
                    $dataToUpdate = [
                        'jumlah' => $jumlahInjury,
                        'status' => $status,
                        'updated_at' => date('Y-m-d'),
                    ];
                    $pengadaanMasukModel->update($id_pengadaan_masuk, $dataToUpdate);

                    // Tambahkan data pengadaan keluar
                    $dataToAdd = [
                        'id_pengadaan_masuk' => $id_pengadaan_masuk,
                        'jumlah' => $jumlah_keluar,
                        'tanggal_keluar' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d'),
                    ];
                    $result = $pengadaanKeluarModel->insert($dataToAdd);

                    if ($result) {
                        session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                        return redirect()->to(base_url('/pengadaan-keluar'));
                    } else {
                        session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
                        return redirect()->back();
                    }
                } else {
                    // Jumlah melebihi stok yang tersedia
                    session()->setFlashdata("error", "Jumlah melebihi stok yang tersedia!!!");
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata("error", "Pengadaan masuk tidak ditemukan!!!");
                return redirect()->back();
            }
        } else {
            session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $title['title'] = "Ubah Bahan Baku Keluar - Pengadaan Harian";
        $pengadaanKeluarModel = new PengadaanKeluarModel;
        $pengadaanKeluar['pengadaankeluar'] = $pengadaanKeluarModel->getPengadaanKeluarById($id);
        return view('pages/pengadaan/keluar/edit', ['title' => $title, 'pengadaanKeluar' => $pengadaanKeluar]);
    }

    public function update($id)
    {
        $pengadaanKeluarModel = new PengadaanKeluarModel();

        $validationRules = [
            'nama' => 'required|max_length[255]',
            'jumlah' => 'required|integer',
            'status' => 'required|in_list[Tersedia, Sisa, Habis]',
            'jenis' => 'required|in_list[Bahan Baku, Bahan Habis Pakai]',
            'kondisi' => 'required|in_list[Rusak, Bagus]',
            'tanggal_keluar' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $existingData = $pengadaanKeluarModel->find($id);

            if (!$existingData) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
            }

            $dataToUpdate = [
                'nama' => $this->request->getPost('nama'),
                'jumlah' => $this->request->getPost('jumlah'),
                'status' => $this->request->getPost('status'),
                'jenis' => $this->request->getPost('jenis'),
                'kondisi' => $this->request->getPost('kondisi'),
                'tanggal_keluar' => $this->request->getPost('tanggal_masuk'),
                'updated_at' => date('Y-m-d'),
            ];

            $result = $pengadaanKeluarModel->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/pengadaan-keluar'));
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
        $pengadaanKeluarModel = new PengadaanKeluarModel();

        $existingData = $pengadaanKeluarModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $result = $pengadaanKeluarModel->delete($id);

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
        $title['title'] = "Filter Pengadaan Keluar - Pengadaan Keluar";
        return view('pages/pengadaan/keluar/filter', ['title' => $title]);
    }

    public function filter_proses()
    {
        $title['title'] = "Data Pengadaan Keluar - Filter";

        $start_periode = $this->request->getPost('start_periode');
        $end_periode = $this->request->getPost('end_periode');

        $pengadaanKeluarModel = new PengadaanKeluarModel();
        $PengadaanKeluar['pengadaankeluar'] = $pengadaanKeluarModel->getFilteredData($start_periode, $end_periode);

        // Tampilkan data pengadaan masuk di view
        return view('pages/pengadaan/keluar/filter_result', ['title' => $title, 'PengadaanKeluar' => $PengadaanKeluar, 'start_periode' => $start_periode, 'end_periode' => $end_periode]);
    }
}
