<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TransactionsModel;

class TransactionDetailsModel extends Model
{
    protected $table = 'transaction_details';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['transaction_id', 'product_id', 'quantity', 'price'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;
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

    public function transaction()
    {
        return $this->belongsTo(TransactionsModel::class, 'transaction_id');
    }

//     public function getTransactionDetailsWithProductAndTransaction()
// {
//     return $this->db->table('transaction_details')
//         ->select('transaction_details.id, transaction_details.transaction_id, transaction_details.product_id, transaction_details.quantity, transaction_details.price, transactions.customers, transactions.status, transactions.total_price, transactions.created_at, transactions.updated_at, products.name, products.qty, products.price as product_price, products.image, products.created_at as product_created_at, products.updated_at as product_updated_at')
//         ->join('transactions', 'transactions.id = transaction_details.transaction_id')
//         ->join('products', 'products.id = transaction_details.product_id')
//         ->where('transactions.id', function($builder) {
//             $builder->select('id')
//                     ->from('transactions')
//                     ->orderBy('id', 'DESC')
//                     ->limit(1);
//         })
//         ->get()
//         ->getResultArray();
// }

public function getTransactionDetailsWithProductAndTransaction()
{
    // Load the URI class
    $uri = service('uri');
    // Get the transaction ID from the URI
    $transactionId = $uri->getSegment(2);

    return $this->db->table('transaction_details')
        ->select('transaction_details.id, transaction_details.transaction_id, transaction_details.product_id, transaction_details.quantity, transaction_details.price, transactions.customers, transactions.status, transactions.total_price, transactions.created_at, transactions.updated_at, products.name, products.qty, products.price as product_price, products.image, products.created_at as product_created_at, products.updated_at as product_updated_at')
        ->join('transactions', 'transactions.id = transaction_details.transaction_id')
        ->join('products', 'products.id = transaction_details.product_id')
        ->where('transactions.id', $transactionId)
        ->get()
        ->getResultArray();
}



    // public function getFilteredDataPrint($start_periode, $end_periode)
    // {
    //     return $this->db->table('transactions')
    //         ->where('created_at >=', $start_periode)
    //         ->where('created_at <=', $end_periode)
    //         ->findAll();
    // }
}
