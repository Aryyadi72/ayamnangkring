<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content');?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
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
            <div class="justify-content-end">
                <a href="<?= base_url('/produk-gallery-view') ?>" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i>Tambah
                </a>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Transaksi</h5>
                    </div>
                    <div class="card-body">
                    <table id="transaksi" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transkasi</th>
                                <th>Customer</th>
                                <th>Menu</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                                <th>Sisa Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($transaksi['transaksi'] as $transaksi):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $transaksi['id'] ?></td>
                                <td><?= $transaksi['customer_name'] ?></td>
                                <td><?= $transaksi['product_name'] ?></td>
                                <td><?= $transaksi['qty'] ?></td>
                                <td><?= $transaksi['total_price'] ?></td>
                                <td><?= $transaksi['down_payment'] ?></td>
                                <td>
                                    <?php
                                    $status = $transaksi['status'];

                                    switch ($status) {
                                        case 'Down Payment':
                                            $badgeClass = 'bg-warning';
                                            break;
                                        case 'Completed':
                                            $badgeClass = 'bg-success';
                                            break;
                                        case 'Pending':
                                            $badgeClass = 'bg-danger';
                                            break;
                                        default:
                                            $badgeClass = 'bg-dark';
                                            break;
                                    }
                                    ?>

                                    <span class="badge rounded-pill <?= $badgeClass ?>">
                                        <?= $status ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ti ti-pencil"></i></a>
                                    <a href="" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
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
<script>$('#transaksi').DataTable();</script>

<?= $this->endSection();?>