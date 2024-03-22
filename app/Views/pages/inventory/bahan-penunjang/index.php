<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content'); ?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Bahan Penunjang</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Bahan Penunjang</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a href="<?= base_url('/bahan-penunjang/create') ?>" class="btn btn-primary">
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
                        <h5>List Bahan Penunjang</h5>
                    </div>
                    <div class="card-body">
                        <table id="bahan_penunjang" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bahanPenunjang['bahan'] as $bahan):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $bahan['kode'] ?>
                                        </td>
                                        <td>
                                            <?= $bahan['nama'] ?>
                                        </td>
                                        <td>
                                            <?= \Carbon\Carbon::parse($bahan['created_at'])->format('d-m-Y') ?>
                                        </td>
                                        <td>
                                            <?= $bahan['qty'] ?>
                                        </td>
                                        <td>
                                            <?= $bahan['satuan'] ?>
                                        </td>
                                        <td>
                                            <?= "Rp " . number_format($bahan['harga'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/bahan-penunjang/edit/' . $bahan['id']) ?>"
                                                class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                            <a href="<?= base_url('/bahan-penunjang/delete/' . $bahan['id']) ?>"
                                                class="btn btn-danger"><i class="ti ti-trash"></i></a>
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
<script>$('#bahan_penunjang').DataTable();</script>

<script>
    $(function () {

        <?php if (session()->has("success")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '<?= session("success") ?>'
            })
        <?php } ?>
    });
</script>

<?= $this->endSection(); ?>