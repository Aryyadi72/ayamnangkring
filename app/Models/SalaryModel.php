<?php

namespace App\Models;

use CodeIgniter\Model;
use Carbon\Carbon;

class SalaryModel extends Model
{
    protected $table = 'salary';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id_employees',
        'id_master_salary',
        'start_period',
        'end_period',
        'pm',
        'ls',
        'bonus_tunjangan',
        'tambahan_tugas',
        'toko',
        'lain_lain',
        'butik',
        'absen_tidak_hadir',
        'created_at',
        'updated_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getEmployees()
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        return $this->select('salary.*, employees.name as employees_name, master_salary.nominal as master_salary_nominal')
            ->join('employees', 'employees.id = salary.id_employees')
            ->join('master_salary', 'master_salary.id = salary.id_master_salary')
            ->where('MONTH(salary.end_period)', $month)
            ->where('YEAR(salary.end_period)', $year)
            ->findAll();
    }

    public function getEmployeesByMonthYear($month, $year)
    {
        if (!is_numeric($month) || !is_numeric($year) || $month < 1 || $month > 12 || $year < 1900 || $year > 3000) {
            return [];
        }

        $tanggalFind = Carbon::create($year, $month, 1, 0, 0, 0);

        $monthFind = $tanggalFind->month;
        $yearFind = $tanggalFind->year;

        return $this->select('salary.*, employees.name as employees_name, master_salary.nominal as master_salary_nominal')
            ->join('employees', 'employees.id = salary.id_employees')
            ->join('master_salary', 'master_salary.id = salary.id_master_salary')
            ->where('MONTH(salary.end_period)', $monthFind)
            ->where('YEAR(salary.end_period)', $yearFind)
            ->findAll();
    }

    public function getSalaryById($id)
    {
        return $this->select('salary.*, employees.name as employees_name, master_salary.nominal as master_salary_nominal, employees.code as employees_code')
            ->join('employees', 'employees.id = salary.id_employees')
            ->join('master_salary', 'master_salary.id = salary.id_master_salary')
            ->where('salary.id', $id)
            ->first();
    }
}
