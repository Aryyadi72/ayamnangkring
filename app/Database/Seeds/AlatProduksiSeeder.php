<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AlatProduksiSeeder extends Seeder
{
    public function run()
    {
        $alatProduksiData = [
            [
                'nama' => 'Alat 1',
                'image' => null,
                'qty' => 5,
                'satuan' => 'PCS',
                'status' => 'LAYAK PAKAI',
                'harga' => '50.75',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Alat 2',
                'image' => null,
                'qty' => 3,
                'satuan' => 'UNIT',
                'status' => 'TIDAK LAYAK',
                'harga' => '30.25',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Alat 3',
                'image' => null,
                'qty' => 8,
                'satuan' => 'BUAH',
                'status' => 'LAYAK PAKAI',
                'harga' => '20.50',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Alat 4',
                'image' => null,
                'qty' => 2,
                'satuan' => 'PCS',
                'status' => 'RUSAK',
                'harga' => '15.90',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'nama' => 'Alat 5',
                'image' => null,
                'qty' => 6,
                'satuan' => 'UNIT',
                'status' => 'LAYAK PAKAI',
                'harga' => '40.00',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
        ];

        $this->db->table('alat_produksi')->insertBatch($alatProduksiData);
    }
}
