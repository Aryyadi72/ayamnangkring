<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content'); ?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-10">
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
                <a href="<?= base_url('/produk/create') ?>" class="btn btn-sm btn-primary">
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
                        <h5>List Produk</h5>
                    </div>
                    <div class="card-body">
                        <table id="produk" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produk as $index => $data): ?>
                                    <tr>
                                        <td>
                                            <?= $index + 1 ?>
                                        </td>
                                        <td>
                                            <?= $data['name'] ?>
                                        </td>
                                        <td>
                                            <?= $data['category'] ?>
                                        </td>
                                        <td>
                                            <?= "Rp " . number_format($data['price'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?= $data['image'] !== null ? $data['image'] : "No Image" ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/produk/edit/' . $data['id']) ?>"
                                                class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                            <a href="<?= base_url('/produk/delete/' . $data['id']) ?>"
                                                class="btn btn-danger"><i class="ti ti-trash"></i></a>
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
<script>$('#produk').DataTable();</script>

<?= $this->endSection(); ?>