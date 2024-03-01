<?php

namespace App\Models;

use CodeIgniter\Model;

class Transactions extends Model
{
    protected $table            = 'transactions';
    protected $primaryKey       = 'transactions_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['products_id', 'customers_id', 'service', 'status', 'total_price', 'receive_price_discount', 'down_payment'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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

    public function getTransactionComplete()
    {
        $builder = $this->db->table('transactions');
        $builder->select('transactions.*, customers.name as customer, products.*');
        $builder->join('customers', 'transactions.customers_id = customers.customers_id', 'left');
        $builder->join('products', 'transactions.products_id = products.products_id', 'left');
        $builder->orderBy('transactions.transactions_id', 'DESC');
        return $builder->get()->getResultArray();
    }
}
