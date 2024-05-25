<?php

namespace App\Models;

use CodeIgniter\Model;

class PengadaanMasukModel extends Model
{
    protected $table = 'pengadaan_masuk';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nama',
        'jumlah',
        'status',
        'jenis',
        'kondisi',
        'harga',
        'tanggal_masuk',
        'created_at',
        'updated_at',
    ];

    protected bool $allowEmptyInserts = false;

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

    public function getPengadaanMasukById($id)
    {
        return $this->find($id);
    }

    public function getFilteredData($start_periode, $end_periode)
    {
        return $this->where('tanggal_masuk >=', $start_periode)
            ->where('tanggal_masuk <=', $end_periode)
            ->findAll();
    }
}
