<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content'); ?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Sample Page</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                        </ul>
                    </div>
                </div>
            </div>
          
        </div> -->
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mx-auto">INVOICE</h5>
                        <!-- <div class="ml-auto">
                    <a href="<?= base_url('/produk-gallery-view') ?>" class="btn btn-primary rounded-pill btn-sm" data-toggle="modal" data-target="#myModal">
                        <i class="ti ti-plus"></i> Tambah
                    </a>
                </div> -->
                    </div>
                </div>
            </div>
            <!-- [ sampl



<!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="col-4">
                                <div>
                                    <label for="exampleInputEmail1" class="form-label"><strong>Nama Pelanggan
                                            :</strong></label>
                                    <p><?= $transaction['customers'] ?? '' ?></p>
                                    <!-- Replace 'customer_name' with the actual column name from your database -->

                                    <label for="exampleInputEmail1" class="form-label"><strong>Kasir :</strong></label>
                                    <p>Kasir</p>
                                    <!-- Replace 'cashier' with the actual column name from your database -->
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="exampleInputEmail1" class="form-label"><strong>Detail :</strong></label>
                                    <p><?= $transaction['created_at'] ?? '' ?></p>
                                    <label for="exampleInputEmail1" class="form-label">
                                        <strong>Metode Pembayaran :</strong>
                                        <span
                                            class="badge badge-success rounded-pill border"><?= $transaction['payment_method'] ?? '' ?></span>
                                    </label>
                                    <br>
                                    <label for="exampleInputEmail1" class="form-label"><strong>Status :</strong>
                                        <?= $transaction['status'] ?? '' ?> </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="exampleInputEmail1" class="form-label"><strong>ID Pesanan :</strong>
                                        <br> </label>
                                    <p><?= $transaction['id'] ?? '' ?></p>
                                    <!-- <br> -->
                                    <label for="exampleInputEmail1" class="form-label"><strong>Tanggal :</strong> <br>
                                    </label>
                                    <p><?= $transaction['created_at'] ?? '' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->




            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Daftar Pesanan</h5>

                        </div>

                        <!-- <form method="get" action="">
    <div class="input-group col-8 ml-3 mt-4">
        <label for="FilterData" class="mr-2 mt-1"><b>Start Date : </b></label>
        <input type="date" name="start_date" class="form-control form-control-sm mr-2" value="" placeholder="Start Date">
        <label for="FilterData" class="mr-2 mt-1"><b>End Date : </b></label>
        <input type="date" name="end_date" class="form-control form-control-sm mr-2" value="" placeholder="End Date">
        <button type="submit" class="btn btn-sm btn-primary rounded-pill mr-2">Filter</button>
        <a href="" class="btn btn-sm btn-danger rounded-pill">Reset</a>
    </div>
</form> -->
                        <!-- 
<div class="input-group col-4 ml-3 mt-4">
    <button type="button" class="btn btn-sm btn-danger rounded-pill mr-2">
        <i class="fas fa-file-pdf"></i> Export PDF
    </button>
    <button type="button" class="btn btn-sm rounded-pill btn-success">
        <i class="fas fa-file-excel"></i> Export Excel
    </button>
</div> -->
                        <div class="card-body">
                            <table id="transaksi" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transdetail as $detail): ?>
                                        <tr>
                                            <td><?= $detail['id'] ?></td>
                                            <td><?= $detail['name'] ?></td>
                                            <td>
                                                <div class="input-group">
                                                    <!-- <button class="btn rounded-pill btn-primary btn-sm"></button> -->
                                                    <p id="jumlah" class="text-center ml-2 mr-2"><?= $detail['quantity'] ?>
                                                    </p>
                                                    <!-- <button class="btn rounded-pill btn-primary btn-sm" onclick="increment()"><i class="fas fa-chevron-right"></i></button> -->
                                                </div>
                                            </td>
                                            <td><?= $detail['price'] ?></td>
                                            <td><?= $detail['quantity'] * $detail['price'] ?></td>
                                            <td>
                                                <a href="#" class="btn rounded-pill btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#myModal"><i class="ti ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Uang Tunai :</h4>
                            <div class="ml-auto d-flex align-items-center">
                                <div class="d-flex">
                                    <h2>Rp. <?= $transaction['receive'] ?? '' ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Sub Total : Rp. <?= $transaction['total_price'] ?? '' ?></p>
                            <p>Diskon : <?= $transaction['discount'] ?? '' ?>%</p>
                            <hr>
                            <p>Kembalian : Rp. <?= $transaction['change'] ?? '' ?></p>
                            <p>Total : Rp. <?= $transaction['total_price'] ?? '' ?></p>

                        </div>
                        <div class="input-group col-4 mb-3">
                            <a href="<?= base_url('transaksi') ?>" class="btn btn-sm btn-dark rounded-pill mr-2"><i
                                    class="ti ti-arrow-back"></i>
                                Kembali</a>
                            <a href="<?= base_url('print/' . $transaction['id']) ?>"
                                class="btn btn-sm rounded-pill btn-primary" target="blank_">
                                <i class="ti ti-printer"></i> Print
                            </a>


                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->








            <!-- Modal HTML -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">BUAT TRANSAKSI</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <?= form_open_multipart('/produk/store') ?>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="productName" name="name"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="productQty" class="form-label">Tanggal Transaksi</label>
                                <input type="text" class="form-control" id="productQty" name="qty"
                                    value="<?= date('Y-m-d'); ?>" readonly>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
                            <!-- <button type="submit" class="btn btn-secondary">Simpan</button> -->
                            <a href="<?= base_url('/transaksi-produk') ?>" class="btn btn-secondary">Simpan</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End Modal -->


            <script>$('#transaksi').DataTable();</script>

            <script>
                function printPage() {
                    window.print();
                }
            </script>
            <?= $this->endSection(); ?>