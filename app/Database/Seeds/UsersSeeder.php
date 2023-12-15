<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = $this->generateData();

        $this->db->table('users')->insertBatch($data);
    }

    private function generateData()
    {
        $data = [];

        for ($i = 1; $i <= 5; $i++) {
            $username = 'user' . $i;
            $email = 'user' . $i . '@example.com';
            $password = password_hash('password' . $i, PASSWORD_BCRYPT);

            $data[] = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        return $data;
    }
}
