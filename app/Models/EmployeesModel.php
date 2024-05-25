<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['users_id', 'code', 'name', 'birth_place', 'birth_date', 'gender', 'position', 'active', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'users_id' => 'required|integer',
        'code' => 'required|max_length[50]',
        'name' => 'required|max_length[255]',
        'birth_place' => 'required|max_length[100]',
        'gender' => 'required|in_list[Male,Female]',
        'position' => 'required|max_length[100]',
        'active' => 'required|in_list[YES,NO]',
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

    public function getEmployeesById($id)
    {
        return $this->find($id);
    }

    public function getActiveEmployees()
    {
        $condition = ['active' => 'YES'];
        return $this->where($condition)->findAll();
    }
}
