<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'employee_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'users_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'birth_place' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'birth_date' => [
                'type' => 'DATE',
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['Male', 'Female'],
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('employee_id', true);
        $this->forge->addForeignKey('users_id', 'users', 'users_id');
        $this->forge->createTable('employees', true);
        $this->db->disableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
