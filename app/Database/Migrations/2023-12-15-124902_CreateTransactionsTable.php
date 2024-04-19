<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
{
      public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'customers' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'total_price' => [
                'type' => 'int',
                'constraint' => '5',
                'null' => true,
            ],
            'change' => [
                'type' => 'int',
                'constraint' => '5',
                'null' => true,
            ],
            'receive' => [
                'type' => 'int',
                'constraint' => '5',
                'null' => true,
            ],
            'discount' => [
                'type' => 'int',
                'constraint' => '5',
                'null' => true,
            ],
            'payment_method' => [
                'type'       => 'ENUM("Cash", "Non Tunai", "DP/Booking", "Amal Saleh")',
                'null'       => true,
            ],
            'service' => [
                'type'       => 'ENUM("Catering","Dine In", "Take Away")',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
