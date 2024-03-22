<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UpgradeModel;

class UpgradeController extends BaseController
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
        $title['title'] = "Data Upgrade - Upgrade";
        $upgradeModel = new UpgradeModel;
        $upgrade['upgrade'] = $upgradeModel->orderBy('created_at', 'DESC')->findAll();
        return view('pages/upgrade/index', ['title' => $title, 'upgrade' => $upgrade]);
    }

    public function create()
    {
        $title['title'] = "Data Upgrade - Upgrade";
        return view('pages/upgrade/create', ['title' => $title]);
    }

    public function store()
    {
        $upgardeModel = new UpgradeModel();

        $kode = $this->request->getPost('kode');

        $existingData = $upgardeModel->where('kode', $kode)->first();
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

            $result = $upgardeModel->insert($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/upgrade'));
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
        $title['title'] = "Ubah Upgrade - Upgrade";
        $upgradeModel = new UpgradeModel;
        $upgrade['upgrade'] = $upgradeModel->getUpgradeById($id);
        return view('pages/upgrade/edit', ['title' => $title, 'upgrade' => $upgrade]);
    }

    public function update($id)
    {
        $upgradeModel = new UpgradeModel();

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
            $existingData = $upgradeModel->find($id);

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

            $result = $upgradeModel->update($id, $dataToUpdate);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/upgrade'));
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
        $upgradeModel = new UpgradeModel();

        $existingData = $upgradeModel->find($id);

        if (!$existingData) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data not found.']);
        }

        $result = $upgradeModel->delete($id);

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
        $title['title'] = "Filter Upgrade - Upgrade";
        return view('pages/upgrade/filter', ['title' => $title]);
    }

    public function filter_proses()
    {
        $title['title'] = "Data Upgrade - Filter";

        $start_periode = $this->request->getPost('start_periode');
        $end_periode = $this->request->getPost('end_periode');

        $upgradeModel = new upgradeModel();
        $upgrade['upgrade'] = $upgradeModel->getFilteredData($start_periode, $end_periode);

        // Tampilkan data pengadaan masuk di view
        return view('pages/upgrade/filter_result', ['title' => $title, 'upgrade' => $upgrade, 'start_periode' => $start_periode, 'end_periode' => $end_periode]);
    }
}
