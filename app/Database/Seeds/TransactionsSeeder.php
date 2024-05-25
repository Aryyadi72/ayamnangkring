<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    public function run()
    {
        $data = $this->generateData();

        $this->db->table('transactions')->insertBatch($data);
    }

    private function generateData()
    {
        $data = [];

        $productsCount = $this->db->table('products')->countAllResults();
        if ($productsCount < 5) {
            throw new \RuntimeException('Not enough products in the database. Run the ProductsSeeder first.');
        }
        $customersCount = $this->db->table('customers')->countAllResults();
        if ($customersCount < 5) {
            throw new \RuntimeException('Not enough customers in the database. Run the CustomersSeeder first.');
        }

        for ($i = 1; $i <= 5; $i++) {
            $productId = rand(1, $productsCount);
            $customersId = rand(1, $customersCount);
            $service = 'Service ' . $i;
            $status = 'Completed';
            $qty = rand();
            $totalPrice = number_format(rand(500, 2000) / 100, 2);
            $receivePriceDiscount = number_format(rand(100, 500) / 100, 2);
            $downPayment = number_format(rand(50, 200) / 100, 2);

            $data[] = [
                'products_id' => $productId,
                'service' => $service,
                'status' => $status,
                'qty' => $qty,
                'total_price' => $totalPrice,
                'down_payment' => $downPayment,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];
        }

        return $data;
    }
}
