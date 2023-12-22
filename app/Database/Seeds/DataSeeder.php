<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('CustomersSeeder');
        $this->call('EmployeesSeeder');
        $this->call('ProductsSeeder');
        $this->call('TransactionsSeeder');
    }
}
