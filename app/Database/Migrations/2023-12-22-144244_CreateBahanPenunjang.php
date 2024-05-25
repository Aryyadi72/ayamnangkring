<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBahanPenunjang extends Migration
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
            'qty' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'satuan' => [
                'type' => 'ENUM',
                'constraint' => ['PCS', 'CUP', 'PACK'],
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['HABIS PAKAI', 'SEMI PERMANEN', 'PERMANEN'],
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
        $this->forge->createTable('bahan_penunjang');
    }

    public function down()
    {
        $this->forge->dropTable('bahan_penunjang');
    }
}