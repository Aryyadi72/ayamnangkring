<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BahanPenunjangSeeder extends Seeder
{
    public function run()
    {
        $bahanPenunjangData = [
            [
                'nama' => 'Bahan 1',
                'qty' => 10,
                'satuan' => 'PCS',
                'kategori' => 'HABIS PAKAI',
                'harga' => '20.50',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Bahan 2',
                'qty' => 5,
                'satuan' => 'CUP',
                'kategori' => 'SEMI PERMANEN',
                'harga' => '15.75',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Bahan 3',
                'qty' => 8,
                'satuan' => 'PACK',
                'kategori' => 'HABIS PAKAI',
                'harga' => '25.00',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Bahan 4',
                'qty' => 15,
                'satuan' => 'PCS',
                'kategori' => 'PERMANEN',
                'harga' => '30.50',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Bahan 5',
                'qty' => 7,
                'satuan' => 'PACK',
                'kategori' => 'HABIS PAKAI',
                'harga' => '18.25',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
        ];

        $this->db->table('bahan_penunjang')->insertBatch($bahanPenunjangData);
    }
}
