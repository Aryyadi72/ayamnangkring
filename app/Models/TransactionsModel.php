<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['products_id', 'service', 'status', 'qty', 'total_price', 'receive_price_discount', 'down_payment', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'products_id'             => 'required|integer',
        'service'                 => 'required|max_length[255]',
        'status'                  => 'required|max_length[50]',
        'qty'                     => 'required|max_length[50]',
        'total_price'             => 'required|numeric',
        'receive_price_discount'  => 'required|numeric',
        'down_payment'            => 'required|numeric',
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

    public function getTransaction()
    {
    return $this->select('transactions.*, products.name as product_name, customers.name as customer_name')
        ->join('products', 'products.id = transactions.products_id')
        ->join('customers', 'customers.id = transactions.customers_id')
        ->findAll();
    }

}
