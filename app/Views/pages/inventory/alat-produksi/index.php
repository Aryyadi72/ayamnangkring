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
                <a href="<?= base_url('/alat-produksi/create') ?>" class="btn btn-primary btn-sm">
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
                        <h5>Alat Produksi</h5>
                    </div>
                    <div class="card-body">
                    <table id="transaksi" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Alat</th>
                                <th>Tanggal</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($alatProduksi['alat'] as $alat) :
                            ?>
                            <tr>
                                <td><?= $no ++ ?></td>
                                <td><?= $alat['image'] ?></td>
                                <td><?= $alat['nama'] ?></td>
                                <td><?= \Carbon\Carbon::parse($alat['created_at'])->format('d-m-Y') ?></td>
                                <td><?= $alat['qty'] ?></td>
                                <td><?= $alat['satuan'] ?></td>
                                <td><?= $alat['status'] ?></td>
                                <td>
                                    <a href="<?= base_url('/alat-produksi/edit/'.$alat['id']) ?>" class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                    <a href="<?= base_url('/alat-produksi/delete/'.$alat['id']) ?>" class="btn btn-danger"><i class="ti ti-trash"></i></a>
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