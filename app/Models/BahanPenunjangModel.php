<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanPenunjangModel extends Model
{
    protected $table = 'bahan_penunjang';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'kode',
        'nama',
        'qty',
        'satuan',
        'kategori',
        'harga',
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
    protected $validationRules = [

    ];

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

    public function getBahanPenunjangById($id)
    {
        return $this->find($id);
    }

    public function getFilteredData($start_periode, $end_periode)
    {
        return $this->where('created_at >=', $start_periode)
            ->where('created_at <=', $end_periode)
            ->findAll();
    }
}
