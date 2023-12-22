<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Nasi Goreng',
                'qty' => 20,
                'price' => '15.00',
                'image' => null, // Set image to null
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Rendang',
                'qty' => 15,
                'price' => '25.50',
                'image' => null, // Set image to null
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Sate Ayam',
                'qty' => 30,
                'price' => '10.75',
                'image' => null, // Set image to null
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            // Add more Indonesian food items as needed
            [
                'name' => 'Nasi Padang',
                'qty' => 25,
                'price' => '18.50',
                'image' => null, // Set image to null
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Gado-Gado',
                'qty' => 18,
                'price' => '12.25',
                'image' => null, // Set image to null
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
