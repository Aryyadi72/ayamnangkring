<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transactions_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'products_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'service' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'total_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'receive_price_discount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'down_payment' => [
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

        $this->forge->addKey('transactions_id', true);
        $this->forge->addForeignKey('products_id', 'products', 'products_id'); // Assuming a foreign key relationship with the products table
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
