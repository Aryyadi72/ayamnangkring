<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    public function run()
    {
        $data = $this->generateData();

        $this->db->table('employees')->insertBatch($data);
    }

    private function generateData()
    {
        $data = [];

        $usersCount = $this->db->table('users')->countAllResults();
        if ($usersCount < 5) {
            throw new \RuntimeException('Not enough users in the database. Run the UsersSeeder first.');
        }

        for ($i = 1; $i <= 5; $i++) {
            $userId = rand(1, $usersCount);
            $code = 'EMP' . $i;
            $name = 'Employee ' . $i;
            $birthPlace = 'City ' . $i;
            $birthDate = date('Y-m-d', strtotime('-' . rand(20, 40) . ' years'));
            $gender = ($i % 2 == 0) ? 'Male' : 'Female';
            $position = 'Position ' . $i;

            $data[] = [
                'users_id' => $userId,
                'code' => $code,
                'name' => $name,
                'birth_place' => $birthPlace,
                'birth_date' => $birthDate,
                'gender' => $gender,
                'position' => $position,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];
        }

        return $data;
    }
}
