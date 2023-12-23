<?php

namespace App\Models;

use CodeIgniter\Model;

class AlatProduksiModel extends Model
{
    protected $table            = 'alat_produksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'qty',
        'satuan',
        'status',
        'harga',
        'created_at',
        'updated_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama'   => 'required|max_length[255]',
        'image'  => 'uploaded[image]|max_size[image,4096]|is_image[image]',
        'qty'    => 'required|integer',
        'satuan' => 'required|in_list[PCS,UNIT,BUAH]',
        'status' => 'required|in_list[LAYAK PAKAI,TIDAK LAYAK,RUSAK]',
        'harga'  => 'required|numeric',
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
