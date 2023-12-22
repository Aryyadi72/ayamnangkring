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

        for ($i = 1; $i <= 5; $i++) {
            $productId = rand(1, $productsCount);
            $service = 'Service ' . $i;
            $status = 'Completed';
            $totalPrice = number_format(rand(500, 2000) / 100, 2);
            $receivePriceDiscount = number_format(rand(100, 500) / 100, 2);
            $downPayment = number_format(rand(50, 200) / 100, 2);

            $data[] = [
                'products_id' => $productId,
                'service' => $service,
                'status' => $status,
                'total_price' => $totalPrice,
                'receive_price_discount' => $receivePriceDiscount,
                'down_payment' => $downPayment,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];
        }

        return $data;
    }
}
