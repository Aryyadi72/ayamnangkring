<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterSalaryModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SalaryModel;
use App\Models\EmployeesModel;
use Carbon\Carbon;
use Dompdf\Dompdf;

class SalaryController extends BaseController
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
        $title['title'] = "Data Gajih - Filter";
        $salaryModel = new SalaryModel();
        $salary['salary'] = $salaryModel->getEmployees();
        // dd($salary['master_salary_nominal']);
        return view('pages/salary/index', ['title' => $title, 'salary' => $salary]);
    }

    public function filter()
    {
        $salaryModel = new SalaryModel();
        $salary['salary'] = $salaryModel->getEmployees();
        $title['title'] = "Data Gajih - Filter";
        return view('pages/salary/filter', ['title' => $title, 'salary' => $salary]);
    }

    public function filter_proses()
    {
        $title['title'] = "Data Gajih - Filter";
        $salaryModel = new SalaryModel();

        $period = $this->request->getPost('periode');

        $tanggalCari = Carbon::createFromFormat('Y-m', $period)->startOfMonth();

        $bulan = $tanggalCari->month;
        $tahun = $tanggalCari->year;

        $salary['salary'] = $salaryModel->getEmployeesByMonthYear($bulan, $tahun);
        return view('pages/salary/index', ['title' => $title, 'salary' => $salary]);
    }

    public function filter_pdf_index()
    {
        $title['title'] = "Slip Gaji - Print";
        return view('pages/salary/print_filter', ['title' => $title]);
    }

    public function filter_pdf()
    {
        $period = $this->request->getPost('periode');

        $salaryModel = new SalaryModel();

        $period = $this->request->getPost('periode');

        $tanggalCari = Carbon::createFromFormat('Y-m', $period)->startOfMonth();

        $bulan = $tanggalCari->month;
        $tahun = $tanggalCari->year;

        $salary['salary'] = $salaryModel->getEmployeesByMonthYear($bulan, $tahun);

        dd($salary);
    }

    public function print_pdf($id)
    {
        $title['title'] = "Slip Gaji - Print";
        $salaryModel = new SalaryModel();
        $salaryData = $salaryModel->getSalaryById($id);

        $gaji = $salaryData['master_salary_nominal'];

        $pm = $salaryData['pm'];
        $ls = $salaryData['ls'];
        $lemburanPm = (($gaji / 28) * 1.5) * $pm;
        $lemburanLs = (($gaji / 28) * 0.5) * $ls;
        $totalLembur = $lemburanPm + $lemburanLs;

        $bonus = $salaryData['bonus_tunjangan'];
        $tugas = $salaryData['tambahan_tugas'];

        $jumlahPenghasilan = round($gaji + $totalLembur + $bonus + $tugas);

        $toko = $salaryData['toko'];
        $butik = $salaryData['butik'];
        $lain = $salaryData['lain_lain'];
        $bon = $toko + $butik + $lain;

        $absen = $salaryData['absen_tidak_hadir'];
        $nominalAbsen = ($gaji / 28) * $absen;

        $jumlahPotongan = round($bon + $nominalAbsen);

        $jumlahGaji = $jumlahPenghasilan - $jumlahPotongan;
        $penghasilanDiterima = round($jumlahGaji, -4);
        $pembulatan = $penghasilanDiterima - $jumlahGaji;

        // dd($jumlahGaji, $penghasilanDiterima, $pembulatan);

        return view('pages/salary/print', [
            'title' => $title,
            'salaryData' => $salaryData
        ]);
    }

    public function create()
    {
        $title['title'] = "Data Gaji - Tambah";
        $sdmModel = new EmployeesModel();
        $sdm['employees'] = $sdmModel->getActiveEmployees();
        $salaryMasterModel = new MasterSalaryModel();
        $sm['salary'] = $salaryMasterModel->findAll();
        return view('pages/salary/create', ['title' => $title, 'sdm' => $sdm, 'sm' => $sm]);
    }

    public function store()
    {
        $salaryModel = new SalaryModel();

        $endPeriod = $this->request->getPost('end_period');
        $startPeriod = Carbon::parse($endPeriod)->subMonth();

        $idEmployees = $this->request->getPost('emp_code');
        $idMasterSalaries = $this->request->getPost('gaji');
        $pm = $this->request->getPost('lemburan_pm');
        $ls = $this->request->getPost('lemburan_ls');

        // Bonus Tunjangan
        $bonusTunjangan = $this->request->getPost('bonus_tunjangan');
        $bonusTunjangan_formatted = str_replace('Rp. ', '', $bonusTunjangan);
        $bonusTunjangan_formatted1 = str_replace('.', '', $bonusTunjangan_formatted);

        // Tambahan Tugas
        $tambahanTugas = $this->request->getPost('tambahan_tugas');
        $tambahanTugas_formatted = str_replace('Rp. ', '', $tambahanTugas);
        $tambahanTugas_formatted1 = str_replace('.', '', $tambahanTugas_formatted);

        // Butik
        $butik = $this->request->getPost('bon_butik');
        $butik_formatted = str_replace('Rp. ', '', $butik);
        $butik_formatted1 = str_replace('.', '', $butik_formatted);

        // Toko
        $toko = $this->request->getPost('bon_toko');
        $toko_formatted = str_replace('Rp. ', '', $toko);
        $toko_formatted1 = str_replace('.', '', $toko_formatted);

        // Lainlain
        $lainLain = $this->request->getPost('bon_lain');
        $lainLain_formatted = str_replace('Rp. ', '', $lainLain);
        $lainLain_formatted1 = str_replace('.', '', $lainLain_formatted);

        $absenTidakHadir = $this->request->getPost('absen_hari');

        $validationRules = [
            'emp_code.*' => 'required',
            'gaji.*' => 'required|integer',
            'lemburan_pm.*' => 'required',
            'lemburan_ls.*' => 'required',
            'bonus_tunjangan.*' => 'required',
            'tambahan_tugas.*' => 'required',
            'bon_butik.*' => 'required',
            'bon_toko.*' => 'required',
            'bon_lain.*' => 'required',
            'absen_hari.*' => 'required',
            'end_period' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [];

            foreach ($idEmployees as $key => $idEmployee) {
                $rowData = [
                    'id_employees' => $idEmployee,
                    'id_master_salary' => $idMasterSalaries[$key],
                    'start_period' => $startPeriod->toDateString(),
                    'end_period' => $endPeriod,
                    'pm' => $pm[$key],
                    'ls' => $ls[$key],
                    'bonus_tunjangan' => $bonusTunjangan_formatted1[$key],
                    'tambahan_tugas' => $tambahanTugas_formatted1[$key],
                    'butik' => $butik_formatted1[$key],
                    'toko' => $toko_formatted1[$key],
                    'lain_lain' => $lainLain_formatted1[$key],
                    'absen_tidak_hadir' => $absenTidakHadir[$key],
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d'),
                ];

                $dataToAdd[] = $rowData;
            }

            $result = $salaryModel->insertBatch($dataToAdd);

            if ($result) {
                session()->setFlashdata("success", "Data Berhasil Ditambahkan!!!");
                return redirect()->to(base_url('/salary'));
            } else {
                session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
                return redirect()->back();
            }
        } else {
            session()->setFlashdata("error", "Data Gagal Ditambahkan!!!");
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
    }
}
