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
                'price' => '15000',
                'image' => null,
                'category' => 'Makanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Rendang',
                'qty' => 15,
                'price' => '25000',
                'image' => null,
                'category' => 'Makanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Sate Ayam',
                'qty' => 30,
                'price' => '15000',
                'image' => null,
                'category' => 'Makanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Nasi Padang',
                'qty' => 25,
                'price' => '10000',
                'image' => null,
                'category' => 'Makanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Gado-Gado',
                'qty' => 18,
                'price' => '12000',
                'image' => null,
                'category' => 'Makanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Es Jeruk',
                'qty' => 18,
                'price' => '5000',
                'image' => null,
                'category' => 'Minuman',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Es Teh',
                'qty' => 18,
                'price' => '5000',
                'image' => null,
                'category' => 'Minuman',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Milo',
                'qty' => 18,
                'price' => '5000',
                'image' => null,
                'category' => 'Minuman',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Delivery Order',
                'qty' => 1,
                'price' => '20000',
                'image' => null,
                'category' => 'Layanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Delivery Order 2',
                'qty' => 1,
                'price' => '25000',
                'image' => null,
                'category' => 'Layanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name' => 'Delivery Order 3',
                'qty' => 1,
                'price' => '30000',
                'image' => null,
                'category' => 'Layanan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
