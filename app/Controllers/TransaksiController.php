<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionsModel;
use App\Models\TransactionDetailsModel;
use App\Models\ProdukModel;
use Carbon\Carbon;

class TransaksiController extends BaseController
{
    protected $filters = ['auth'];

    protected $helpers = ['form'];

    public function indexGallery($transactionId)
    {
        // Fetch the transaction data based on the provided $transactionId
        $transaksiModel = new TransactionsModel();
        $transaction = $transaksiModel->find($transactionId);


        // Fetch other necessary data (if needed)
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();

        // Fetch details using join
        $transaksiDetailModel = new TransactionDetailsModel();
        $transactionDetails = $transaksiDetailModel->getTransactionDetailsWithProductAndTransaction();

        $title['title'] = "Transaksi - Produk";

        // Pass the data to the view
        return view('pages/transaksi/product_card', [
            'title' => $title,
            'produk' => $produk,
            'transaction' => $transaction,
            'transactionDetails' => $transactionDetails,
        ]);
    }


    public function payment_process($transactionId)
    {
        $title['title'] = "Transaksi - Produk";

        // Fetch the transaction ID from POST data or adjust as needed
        // $transactionId = $this->request->getPost('transaction_id');
        $uri = service('uri'); // Load the URI class

        $transactionId = $uri->getSegment(2); // Get the second segment of the URI, which is the transaction ID

        // Fetch necessary data for the view
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();

        $transaksiModel = new TransactionsModel();
        $transaction = $transaksiModel->find($transactionId);
        // $transactiondata = $transaksiModel->find($transactionId);

        // Calculate and update total price
        $totalPrice = $this->calculateAndUpdateTotalPrice($transactionId);

        // Fetch transaction details for the given transactionId
        $transaksiDetailModel = new TransactionDetailsModel();
        $transactionDetails = $transaksiDetailModel->where('transaction_id', $transactionId)->findAll();

        $transdetail = $transaksiDetailModel->getTransactionDetailsWithProductAndTransaction();

        // Pass the data to the view
        $data['produk'] = $produk;
        $data['transaction'] = $transaction;
        $data['transactionDetails'] = $transactionDetails;
        $data['transdetail'] = $transdetail;

        // var_dump($transdetail);exit;

        return view('pages/transaksi/payment', [
            'title' => $title,
            'produk' => $produk,
            'transaction' => $transaction,
            'transactionDetails' => $transactionDetails,
            'transdetail' => $transdetail,
        ]);
    }


    public function calculateAndUpdateTotalPrice($transactionId)
    {
        $transaksiDetailModel = new TransactionDetailsModel();
        $transaksiModel = new TransactionsModel();

        // Fetch all transaction details for the given transactionId
        $transactionDetails = $transaksiDetailModel->where('transaction_id', $transactionId)->findAll();

        // Calculate total_price based on the sum of quantity * price for each detail
        $totalPrice = 0;
        foreach ($transactionDetails as $detail) {
            $totalPrice += $detail['price'] * $detail['quantity'];
        }

        // Update total_price in transactions table
        $transaksiModel->set('total_price', $totalPrice)->where('id', $transactionId)->update();

        return $totalPrice;
    }

    public function invoice_view($transactionId)
    {
        $title['title'] = "Transaksi - Produk";

        $transaksiModel = new TransactionsModel();
        $transaction = $transaksiModel->find($transactionId);

        $transaksiDetailModel = new TransactionDetailsModel();
        $transactionDetails = $transaksiDetailModel->where('transaction_id', $transactionId)->findAll();

        $transdetail = $transaksiDetailModel->getTransactionDetailsWithProductAndTransaction();

        $data['transaction'] = $transaction;
        $data['transactionDetails'] = $transactionDetails;
        $data['transdetail'] = $transdetail;

        // Pass the transaction data to the view
        return view('pages/transaksi/invoice', [
            'title' => $title,
            'transaction' => $transaction,
            'transactionDetails' => $transactionDetails,
            'transdetail' => $transdetail,
        ]);
    }

    public function print_view($transactionId)
    {
        $title['title'] = "Transaksi - Produk";

        $transaksiModel = new TransactionsModel();
        $transaction = $transaksiModel->find($transactionId);

        $transaksiDetailModel = new TransactionDetailsModel();
        $transactionDetails = $transaksiDetailModel->where('transaction_id', $transactionId)->findAll();

        $transdetail = $transaksiDetailModel->getTransactionDetailsWithProductAndTransaction();

        $data['transaction'] = $transaction;
        $data['transactionDetails'] = $transactionDetails;
        $data['transdetail'] = $transdetail;

        // Pass the transaction data to the view
        return view('pages/transaksi/print', [
            'title' => $title,
            'transaction' => $transaction,
            'transactionDetails' => $transactionDetails,
            'transdetail' => $transdetail,
        ]);
    }

    public function index()
    {
        try {
            $title['title'] = "Data Transaki - Transaksi";
            $transaksiModel = new TransactionsModel();
            $transaksi = $transaksiModel->getTransaction();

            // Return the view with the data
            return view('/pages/transaksi/index', ['title' => $title, 'transaksi' => $transaksi]);
        } catch (\Exception $e) {
            // Handle the exception, log it, or redirect to an error page
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred while fetching data.']);
        }
    }

    public function store()
    {
        $transaksiModel = new TransactionsModel();

        $validationRules = [
            'customers' => 'required|max_length[500]',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'customers' => $this->request->getPost('customers'),
                'status' => $this->request->getPost('status'),
                'total_price' => $this->request->getPost('total_price'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $result = $transaksiModel->insert($dataToAdd);

            if ($result) {
                // Get the ID of the newly inserted record
                $newlyInsertedId = $transaksiModel->insertID();

                session()->setFlashdata("success", "Berhasil disimpan!");

                // Redirect to the indexGallery method with the new ID
                return redirect()->to("/transaksi-produk/$newlyInsertedId");
            } else {
                session()->setFlashdata("error", "Data gagal ditambahkan.");
            }

            // Redirect back to the same page
            return redirect()->back();
        } else {
            return $this->response->setJSON(['status' => 'validation_error', 'errors' => $this->validator->getErrors()]);
        }
    }

    public function storeToCart()
    {
        $transaksiDetailModel = new TransactionDetailsModel();

        $validationRules = [
            'transaction_id' => 'numeric',
            'product_id' => 'numeric',
            'quantity' => 'numeric',
        ];

        if ($this->validate($validationRules)) {
            $dataToAdd = [
                'transaction_id' => $this->request->getPost('transaction_id'),
                'product_id' => $this->request->getPost('product_id'),
                'quantity' => $this->request->getPost('quantity'),
                'price' => $this->request->getPost('price'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $result = $transaksiDetailModel->insert($dataToAdd);

            if ($result) {
                // Get the ID of the newly inserted record
                $transaksiModel = new TransactionsModel();
                $transactionId = $this->request->getPost('transaction_id');
                $transaction = $transaksiModel->find($transactionId);

                session()->setFlashdata("success", "Berhasil disimpan!");

                // Redirect to the indexGallery method with the new ID
                return redirect()->to("/transaksi-produk/$transactionId");
            } else {
                session()->setFlashdata("error", "Data gagal ditambahkan.");
            }

            // Redirect back to the same page
            return redirect()->back();
        } else {
            return $this->response->setJSON(['status' => 'validation_error', 'errors' => $this->validator->getErrors()]);
        }
    }

    public function deleteFromCart($transactionDetailId)
    {
        $transaksiDetailModel = new TransactionDetailsModel();

        // Check if the transaction detail exists
        $transactionDetail = $transaksiDetailModel->find($transactionDetailId);
        if (!$transactionDetail) {
            // Handle case where the transaction detail is not found
            return redirect()->to("/transaksi-produk")->with('error', 'Transaction detail not found.');
        }

        // Perform the deletion
        $result = $transaksiDetailModel->delete($transactionDetailId);

        if ($result) {
            session()->setFlashdata("success", "Item berhasil dihapus!");
        } else {
            session()->setFlashdata("error", "Gagal menghapus item.");
        }

        // Redirect back to the indexGallery method
        return redirect()->to("/transaksi-produk/{$transactionDetail['transaction_id']}");
    }


    // public function updateCart()
// {
//     $request = service('request');

    //     // Ambil data dari body permintaan
//     $data = $request->getJSON();

    //     $transactionDetailsModel = new TransactionDetailsModel();
//    $transactionDetailsModel->update($data->id, [
//     'quantity' => $data->quantity,
//     'harga' => $data->harga,
//     'totalHarga' => (float) $data->totalHarga
// ]);


    //     // Berikan respons JSON berhasil
//     return $this->response->setStatusCode(200)->setJSON(['message' => 'Data berhasil diperbarui']);
// }

    public function updateCart()
    {
        $transaksiDetailModel = new TransactionDetailsModel();

        $validationRules = [
            'quantity' => 'numeric',
            'price' => 'numeric',
        ];

        if ($this->validate($validationRules)) {
            // Ambil data dari permintaan POST
            $transactionDetailId = $this->request->getPost('id');
            $quantity = $this->request->getPost('quantity');
            $price = $this->request->getPost('price');

            // Fetch existing transaction detail
            $existingDetail = $transaksiDetailModel->find($transactionDetailId);

            if ($existingDetail) {
                // Update the quantity and price
                $dataToUpdate = [
                    'quantity' => $quantity,
                    'price' => $price,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $result = $transaksiDetailModel->update($transactionDetailId, $dataToUpdate);

                // Redirect to the indexGallery method with the transaction ID
                return redirect()->to("/transaksi-produk/{$existingDetail['transaction_id']}");
            } else {
                // Transaction detail not found
                session()->setFlashdata("error", "Detail transaksi tidak ditemukan.");
            }

            // Redirect back to the same page
            return redirect()->back();
        } else {
            // Validation error
            return $this->response->setJSON(['status' => 'validation_error', 'errors' => $this->validator->getErrors()]);
        }
    }

    public function checkout()
    {
        // Validation rules
        $validationRules = [
            'id' => 'required|numeric',
            'payment_method' => 'required|in_list[Cash,Non Tunai,DP/Booking,Amal Saleh]',
            'service' => 'required|in_list[Catering,Dine In,Take Away]',
            'change' => 'required|numeric',
            'receive' => 'required|numeric',
            'discount' => 'required|numeric',
            'total_price' => 'required|numeric',
        ];

        // Get the id from the POST data
        $id = $this->request->getPost('id');

        // Validate the data
        if ($this->validate($validationRules)) {
            // Proceed if validation passes
            $payment_method = $this->request->getPost('payment_method');
            $service = $this->request->getPost('service');
            $change = $this->request->getPost('change');
            $receive = $this->request->getPost('receive');
            $discount = $this->request->getPost('discount');
            $total_price = $this->request->getPost('total_price');

            // dd($service);

            // Calculate additional cost based on 'service' and 'quantity'
            $transaksiDetailModel = new TransactionDetailsModel();
            $transdetail = $transaksiDetailModel->where('transaction_id', $id)->findAll();
            $additionalCost = 0;

            foreach ($transdetail as $detail) {
                $quantity = $detail['quantity'];

                switch ($service) {
                    case 'Catering':
                        // Catering cost per quantity: 2000
                        $additionalCost += $quantity * 2000;
                        break;
                    case 'Dine In':
                        // Dine In has no additional cost
                        // You can add logic here if needed
                        break;
                    case 'Take Away':
                        // Take Away cost per quantity: 1000
                        $additionalCost += $quantity * 1000;
                        break;
                }
            }

            // Update total_price with additional cost
            $total_price += $additionalCost;


            // Update the transaction status and details
            $transaksiModel = new TransactionsModel();
            $transaksiModel->where('id', $id)->set([
                'payment_method' => $payment_method,
                'service' => $service,
                'change' => $change,
                'receive' => $receive,
                'discount' => $discount,
                'total_price' => $total_price,
                'status' => 'Completed',
            ])->update();

            // Fetch necessary data for the view
            $produkModel = new ProdukModel();
            $produk = $produkModel->findAll();

            // Fetch transaction details based on the updated transaction ID
            $transaction = $transaksiModel->find($id);
            $transactionDetails = $transaksiDetailModel->where('transaction_id', $id)->findAll();

            // Fetch additional data if needed
            $transdetail = $transaksiDetailModel->getTransactionDetailsWithProductAndTransaction();

            // Pass the data to the view
            $data['produk'] = $produk;
            $data['transaction'] = $transaction;
            $data['transactionDetails'] = $transactionDetails;
            $data['transdetail'] = $transdetail;

            // Send a JSON response with the updated transaction ID
            return $this->response->setJSON(['success' => true, 'data' => ['id' => $id]]);
        } else {
            // If validation fails, handle accordingly
            if ($this->request->isAJAX()) {
                // If it's an AJAX request, send a JSON response with errors
                return $this->response->setJSON(['success' => false, 'errors' => $this->validator->getErrors()]);
            } else {
                // If it's a regular form submission, redirect back with errors
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
        return $this->response->setJSON(['success' => true, 'data' => ['id' => $id]]);
    }
    // Send a JSON response with the updated transaction ID


    // Controller function that loads the view with the filtered data
    public function showFilteredData()
    {
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');

        // Check if both start and end dates are provided and not empty
        if (!empty($start_date) && !empty($end_date)) {
            // Add validation for dates if needed

            // Perform database query only if dates are not empty
            $transaksiModel = new TransactionsModel();
            $transaksi = $transaksiModel->getFilteredData($start_date, $end_date);

            // $data['transaksi'] = $transaksi;
            // $title = $title['title'] = 'Transaksi - Produk'; // Replace with your actual title
            $title['title'] = "Transaksi- Produk";

            // Load your view with the filtered data
            return view('pages/transaksi/index', ['title' => $title, 'transaksi' => $transaksi]);
        } else {
            // Either start or end date is empty, redirect back to the same page
            return view('pages/transaksi/index', [
                'error' => 'Please provide both start and end dates.',
            ]);
        }
    }

    public function filter()
    {
        $title['title'] = "Filter Transaksi - Transaksi";
        return view('pages/transaksi/filter', ['title' => $title]);
    }

    public function filter_proses()
    {
        $periode = $this->request->getPost('periode');
        $shift = $this->request->getPost('shift');
        $firstShiftStart = '08:00:00';
        $firstShiftEnd = '16:00:00';
        $secondShiftStart = '16:01:00';
        $secondShiftEnd = '22:00:00';

        if ($shift == 1) {
            $firstShiftStartNew = Carbon::createFromFormat('Y-m-d H:i:s', $periode . ' ' . $firstShiftStart);
            $firstShiftEndNew = Carbon::createFromFormat('Y-m-d H:i:s', $periode . ' ' . $firstShiftEnd);

            $transaksiModel = new TransactionsModel();
            $transaksis = $transaksiModel->where('created_at >=', $firstShiftStartNew)->where('created_at <=', $firstShiftEndNew)->findAll();

        } else {
            $secondShiftStartNew = Carbon::createFromFormat('Y-m-d H:i:s', $periode . ' ' . $secondShiftStart);
            $secondShiftEndNew = Carbon::createFromFormat('Y-m-d H:i:s', $periode . ' ' . $secondShiftEnd);

            $transaksiModel = new TransactionsModel();
            $transaksis = $transaksiModel->where('created_at >=', $secondShiftStartNew)->where('created_at <=', $secondShiftEndNew)->findAll();
        }

        $id_detail_transaksis = [];

        foreach ($transaksis as $transaksi) {
            $id_detail_transaksis[] = $transaksi['id'];
        }

        $detailTransaksiModel = new TransactionDetailsModel();
        $detail_transaksis = $detailTransaksiModel->whereIn('transaction_id', $id_detail_transaksis)->findAll();

        $totalQuantity = [];

        foreach ($detail_transaksis as $detail_transaksi) {
            $product_id = $detail_transaksi['product_id'];
            $quantity = $detail_transaksi['quantity'];

            if (isset($totalQuantity[$product_id])) {
                $totalQuantity[$product_id] += $quantity;
            } else {
                $totalQuantity[$product_id] = $quantity;
            }
        }

        $produkModel = new ProdukModel();
        $produkData = $produkModel->findAll();

        $totalQuantityByCategory = [];

        foreach ($produkData as $produk) {
            $category = $produk['category'];
            $product_id = $produk['id'];

            if (!isset($totalQuantityByCategory[$category])) {
                $totalQuantityByCategory[$category] = 0;
            }

            if (isset($totalQuantity[$product_id])) {
                $totalQuantityByCategory[$category] += $totalQuantity[$product_id];
            }
        }

        return view('pages/transaksi/filter_result', [
            'produkData' => $produkData,
            'totalQuantity' => $totalQuantity,
            'totalQuantityByCategory' => $totalQuantityByCategory
        ]);
    }

}
