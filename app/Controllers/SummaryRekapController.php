<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AlatProduksiModel;
use App\Models\BahanPenunjangModel;
use App\Models\UpgradeModel;
use App\Models\PemeliharaanModel;
use App\Models\PengadaanMasukModel;
use App\Models\SummaryHarianModel;
use Carbon\Carbon;

class SummaryRekapController extends BaseController
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
        $title['title'] = "Data Summary - Summary Rekap";
        $summaryHarianModel = new SummaryHarianModel();
        $summaryHarian['summaryHarian'] = $summaryHarianModel->orderBy('created_at', 'DESC')->findAll();
        return view('pages/summary/index', ['title' => $title, 'summaryHarian' => $summaryHarian]);
    }

    public function before_create()
    {
        $title['title'] = "Tambah Data Summary - Summary Rekap";
        return view('pages/summary/create_date', ['title' => $title]);
    }

    public function create()
    {
        $title['title'] = "Tambah Data Summary - Summary Rekap";

        $start_periode = $this->request->getPost('start_periode');
        $end_periode = Carbon::parse($start_periode)->addDays()->format('Y-m-d');

        $summaryHarianModel = new SummaryHarianModel();
        $latestData = $summaryHarianModel->orderBy('created_at', 'desc')->first();

        if ($latestData) {
            $nilaiField = $latestData['modal_akhir'];
        } else {
            $nilaiField = 0;
        }

        $pengadaanMasukModel = new PengadaanMasukModel();
        $PengadaanMasuk['pengadaanmasuk'] = $pengadaanMasukModel->getFilteredData($start_periode, $end_periode);

        $pemeliharaanModel = new PemeliharaanModel();
        $Pemeliharaan['pemeliharaan'] = $pemeliharaanModel->getFilteredData($start_periode, $end_periode);

        $upgardeModel = new UpgradeModel();
        $Upgrade['upgrade'] = $upgardeModel->getFilteredData($start_periode, $end_periode);

        $bahanPenunjangModel = new BahanPenunjangModel();
        $BahanPenunjang['bahanPenunjang'] = $bahanPenunjangModel->getFilteredData($start_periode, $end_periode);

        $alatProduskiModel = new AlatProduksiModel();
        $AlatProduksi['alatProduksi'] = $alatProduskiModel->getFilteredData($start_periode, $end_periode);

        $hargaPengadaanMasuk = array_sum(array_column($PengadaanMasuk['pengadaanmasuk'], 'harga'));
        $hargaPemeliharaan = array_sum(array_column($Pemeliharaan['pemeliharaan'], 'harga'));
        $hargaUpgrade = array_sum(array_column($Upgrade['upgrade'], 'harga'));
        $hargaBahanPenunjang = array_sum(array_column($BahanPenunjang['bahanPenunjang'], 'harga'));
        $hargaAlatProduksi = array_sum(array_column($AlatProduksi['alatProduksi'], 'harga'));

        $total = $hargaPengadaanMasuk + $hargaPemeliharaan + $hargaUpgrade + $hargaBahanPenunjang + $hargaAlatProduksi;

        return view('pages/summary/create', [
            'title' => $title,
            'start_periode' => $start_periode,
            'end_periode' => $end_periode,
            'PengadaanMasuk' => $PengadaanMasuk,
            'Pemeliharaan' => $Pemeliharaan,
            'Upgrade' => $Upgrade,
            'BahanPenunjang' => $BahanPenunjang,
            'AlatProduksi' => $AlatProduksi,
            'total' => $total,
            'nilaiField' => $nilaiField
        ]);
    }

    public function store()
    {
        $summaryHarianModel = new SummaryHarianModel();

        $modal_awal = $this->request->getPost('modal_awal');
        $modal_awal_formatted = str_replace('Rp. ', '', $modal_awal);
        $modal_awal_formatted1 = str_replace('.', '', $modal_awal_formatted);

        $modal_akhir = $this->request->getPost('modal_akhir');
        $modal_akhir_formatted = str_replace('Rp. ', '', $modal_akhir);
        $modal_akhir_formatted1 = str_replace('.', '', $modal_akhir_formatted);

        $cash = $this->request->getPost('cash');
        $cash_formatted = str_replace('Rp. ', '', $cash);
        $cash_formatted1 = str_replace('.', '', $cash_formatted);

        $tunai = $this->request->getPost('tunai');
        $tunai_formatted = str_replace('Rp. ', '', $tunai);
        $tunai_formatted1 = str_replace('.', '', $tunai_formatted);

        $tf = $this->request->getPost('tf');
        $tf_formatted = str_replace('Rp. ', '', $tf);
        $tf_formatted1 = str_replace('.', '', $tf_formatted);

        $ns = $this->request->getPost('ns');
        $ns_formatted = str_replace('Rp. ', '', $ns);
        $ns_formatted1 = str_replace('.', '', $ns_formatted);

        $total_today = $this->request->getPost('total_today');
        $total_today_formatted = str_replace('Rp. ', '', $total_today);
        $total_today_formatted1 = str_replace('.', '', $total_today_formatted);

        $dataToAdd = [
            'modal_awal' => $modal_awal_formatted1,
            'inputer' => $this->request->getPost('inputer'),
            'modal_akhir' => $modal_akhir_formatted1,
            'cash' => $cash_formatted1,
            'tunai' => $tunai_formatted1,
            'tf' => $tf_formatted1,
            'ns' => $ns_formatted1,
            'total_today' => $total_today_formatted1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $result = $summaryHarianModel->insert($dataToAdd);

        if ($result) {
            session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
            return redirect()->to(base_url('/summary-harian'));
        } else {
            session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $title['title'] = "Detail Summary Harian - Summary Harian";

        $summaryHarianModel = new SummaryHarianModel();
        $summaryHarian['summaryHarian'] = $summaryHarianModel->getUpgradeById($id);

        $nilaiField = $summaryHarian['summaryHarian']['created_at'];

        $start_periode = Carbon::parse($nilaiField)->format('Y-m-d');
        $end_periode = Carbon::parse($start_periode)->addDays()->format('Y-m-d');

        $pengadaanMasukModel = new PengadaanMasukModel();
        $PengadaanMasuk['pengadaanmasuk'] = $pengadaanMasukModel->getFilteredData($start_periode, $end_periode);

        $pemeliharaanModel = new PemeliharaanModel();
        $Pemeliharaan['pemeliharaan'] = $pemeliharaanModel->getFilteredData($start_periode, $end_periode);

        $upgardeModel = new UpgradeModel();
        $Upgrade['upgrade'] = $upgardeModel->getFilteredData($start_periode, $end_periode);

        $bahanPenunjangModel = new BahanPenunjangModel();
        $BahanPenunjang['bahanPenunjang'] = $bahanPenunjangModel->getFilteredData($start_periode, $end_periode);

        $alatProduskiModel = new AlatProduksiModel();
        $AlatProduksi['alatProduksi'] = $alatProduskiModel->getFilteredData($start_periode, $end_periode);

        $hargaPengadaanMasuk = array_sum(array_column($PengadaanMasuk['pengadaanmasuk'], 'harga'));
        $hargaPemeliharaan = array_sum(array_column($Pemeliharaan['pemeliharaan'], 'harga'));
        $hargaUpgrade = array_sum(array_column($Upgrade['upgrade'], 'harga'));
        $hargaBahanPenunjang = array_sum(array_column($BahanPenunjang['bahanPenunjang'], 'harga'));
        $hargaAlatProduksi = array_sum(array_column($AlatProduksi['alatProduksi'], 'harga'));

        $total = $hargaPengadaanMasuk + $hargaPemeliharaan + $hargaUpgrade + $hargaBahanPenunjang + $hargaAlatProduksi;

        return view('pages/summary/detail', [
            'title' => $title,
            'summaryHarian' => $summaryHarian,
            'start_periode' => $start_periode,
            'end_periode' => $end_periode,
            'PengadaanMasuk' => $PengadaanMasuk,
            'Pemeliharaan' => $Pemeliharaan,
            'Upgrade' => $Upgrade,
            'BahanPenunjang' => $BahanPenunjang,
            'AlatProduksi' => $AlatProduksi,
            'nilaiField' => $nilaiField,
            'total' => $total
        ]);
    }

    public function filter()
    {
        $title['title'] = "Filter Summary Harian - Summary Harian";
        return view('pages/summary/filter', ['title' => $title]);
    }

    public function filter_proses()
    {
        $title['title'] = "Data Summary Harian - Filter";

        $start_periode = $this->request->getPost('start_periode');
        $end_periode = Carbon::parse($start_periode)->addDays()->format('Y-m-d');

        $summaryHarianModel = new SummaryHarianModel();
        $summaryHarian['summaryHarian'] = $summaryHarianModel->getFilteredData($start_periode, $end_periode);

        return view('pages/summary/filter_result', ['title' => $title, 'summaryHarian' => $summaryHarian, 'start_periode' => $start_periode, 'end_periode' => $end_periode]);
    }
}
