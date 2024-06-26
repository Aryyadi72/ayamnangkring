<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TransactionDetailsModel;

class TransactionsModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['customers', 'status', 'service', 'total_price', 'change', 'receive', 'payment_method', 'discount', 'created_at', 'updated_at'];

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

    public function getTransaction()
    {
        return $this->findAll();
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetailsModel::class, 'transaction_id');
    }

    // Model function to get filtered data
    public function getFilteredData($start_date, $end_date)
    {
        // Add your database query logic to fetch data based on the provided dates
        // Make sure to properly escape and validate user input to prevent SQL injection

        // Example:
        return $this->db->table('transactions')
            ->select('*')
            ->where('created_at >=', $start_date)
            ->where('created_at <=', $end_date)
            ->where('created_at IS NOT NULL', null, false) // Add the third parameter to disable quoting
            ->get()
            ->getResultArray();
    }



}
