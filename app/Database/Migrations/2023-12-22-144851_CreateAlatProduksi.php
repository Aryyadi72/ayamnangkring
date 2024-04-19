<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlatProduksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'satuan' => [
                'type' => 'ENUM',
                'constraint' => ['PCS','UNIT','BUAH'],
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['LAYAK PAKAI', 'TIDAK LAYAK', 'RUSAK'],
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('alat_produksi');
    
    }

    public function down()
    {
        $this->forge->dropTable('alat_produksi');
    }
}
