<?php

namespace App\Models;

use CodeIgniter\Model;

class PengadaanKeluarModel extends Model
{
    protected $table = 'pengadaan_keluar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id_pengadaan_masuk',
        'jumlah',
        'tanggal_keluar',
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

    public function getPengadaanKeluarById($id)
    {
        return $this->find($id);
    }

    public function getPengadaanData()
    {
        return $this->select('pengadaan_keluar.jumlah as jumlah_keluar, pengadaan_keluar.tanggal_keluar as tanggal_keluar, pengadaan_masuk.*')
            ->join('pengadaan_masuk', 'pengadaan_masuk.id = pengadaan_keluar.id_pengadaan_masuk')
            ->orderBy('pengadaan_keluar.tanggal_keluar', 'DESC')
            ->findAll();
    }

    public function getFilteredData($start_periode, $end_periode)
    {
        return $this->select('pengadaan_keluar.jumlah as jumlah_keluar, pengadaan_keluar.tanggal_keluar as tanggal_keluar, pengadaan_masuk.*')
            ->join('pengadaan_masuk', 'pengadaan_masuk.id = pengadaan_keluar.id_pengadaan_masuk')
            ->where('tanggal_keluar >=', $start_periode)
            ->where('tanggal_keluar <=', $end_periode)
            ->findAll();
    }
}
