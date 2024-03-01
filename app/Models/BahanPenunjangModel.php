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
        'nama' => 'required|max_length[255]',
        'qty' => 'required|integer',
        'satuan' => 'required|in_list[PCS,CUP,PACK]',
        'kategori' => 'required|in_list[HABIS PAKAI,SEMI PERMANEN,PERMANEN]',
        'harga' => 'required|numeric',
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
}
