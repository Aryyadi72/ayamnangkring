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
            'products_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'customers_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 5,
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
                'type' => 'DATE',
            ],
            'updated_at' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('products_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('customers_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transactions');
    } 

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
