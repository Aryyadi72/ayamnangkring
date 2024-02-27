<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content');?>

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
                <h5>TRANSAKSI</h5>
                <div class="ml-auto">
                    <a href="<?= base_url('/produk-gallery-view') ?>" class="btn btn-primary rounded-pill btn-sm" data-toggle="modal" data-target="#myModal">
                        <i class="ti ti-plus"></i> Tambah
                    </a>
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
    <h5>List Transaksi</h5>

</div>

<form method="get" action="">
    <div class="input-group col-8 ml-3 mt-4">
        <label for="FilterData" class="mr-2 mt-1"><b>Start Date : </b></label>
        <input type="date" name="start_date" class="form-control form-control-sm mr-2" value="" placeholder="Start Date">
        <label for="FilterData" class="mr-2 mt-1"><b>End Date : </b></label>
        <input type="date" name="end_date" class="form-control form-control-sm mr-2" value="" placeholder="End Date">
        <button type="submit" class="btn btn-sm btn-primary rounded-pill mr-2">Filter</button>
        <a href="" class="btn btn-sm btn-danger rounded-pill">Reset</a>
    </div>
</form>

<div class="input-group col-4 ml-3 mt-4">
    <button type="button" class="btn btn-sm btn-danger rounded-pill mr-2">
        <i class="fas fa-file-pdf"></i> Export PDF
    </button>
    <button type="button" class="btn btn-sm rounded-pill btn-success">
        <i class="fas fa-file-excel"></i> Export Excel
    </button>
</div>
<div class="card-body">
        <table id="transaksi" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $index => $data) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $data['customers'] ?? 'N/A' ?></td>
                        <td><?= $data['created_at'] ?? 'N/A' ?></td>
                        <td><?= $data['total_price'] ?? 'N/A' ?></td>
                        <td>
                            <?php
                            $badgeClass = '';
                            switch ($data['status']) {
                                case 'Completed':
                                    $badgeClass = 'badge-success';
                                    break;
                                case 'DP':
                                    $badgeClass = 'badge-warning';
                                    break;
                                case 'Pending':
                                    $badgeClass = 'badge-danger';
                                    break;
                                default:
                                    $badgeClass = 'badge-danger';
                            }
                            ?>
                            <span class="badge <?= $badgeClass ?> rounded-pill border">
                                <?= $data['status'] ?? 'Pending' ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('/produk-gallery-view/delete/' . $data['id']) ?>" class="btn rounded-pill btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                                <i class="ti ti-trash"></i> Hapus
                            </a>
                            <a href="<?= base_url('/transaksi-produk/' . $data['id']) ?>" class="btn rounded-pill btn-secondary btn-sm">
                            <i class="fa-solid fa-cart-shopping"></i> Keranjang
                            </a>
                            <a href="<?= base_url('/payment-detail/' . $data['id']) ?>" class="btn rounded-pill btn-info btn-sm">
                                <i class="ti ti-eye"></i> Detail
                            </a>
                            <a href="<?= base_url('/invoice/' . $data['id']) ?>" class="btn rounded-pill btn-primary btn-sm">
                                <i class="fa-solid fa-print"></i> Print
                            </a>
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
    </div>
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
                <?= form_open_multipart('/transaksi/store') ?>
    <div class="mb-3">
        <label for="productName" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="productName" name="customers" aria-describedby="emailHelp">
    </div>
<div class="mb-3">
    <label for="productQty" class="form-label">Tanggal Transaksi</label>
    <input type="text" class="form-control" id="productQty" name="" value="<?= date('Y-m-d'); ?>" readonly>
</div>
</div>

<!-- Modal Footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-sm btn-dark rounded-pill" data-dismiss="modal">Keluar</button>
    <button type="submit" class="btn btn-sm btn-success rounded-pill">Simpan</button>
    <!-- <a href="<?= base_url('/transaksi-produk') ?>" class="btn btn-secondary">Simpan</a> -->
</div>
</form>

        </div>
    </div>
</div>
<!-- End Modal -->


<script>$('#transaksi').DataTable();</script>



<?= $this->endSection();?>