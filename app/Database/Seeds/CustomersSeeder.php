<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomersSeeder extends Seeder
{
    public function run()
    {
        $data = $this->generateData();

        $this->db->table('customers')->insertBatch($data);
    }

    private function generateData()
    {
        $data = [];

        for ($i = 1; $i <= 5; $i++) {
            $name = 'Customer ' . $i;

            $data[] = [
                'name' => $name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        return $data;
    }
}
