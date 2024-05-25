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
                            <h5 class="m-b-10">Pemeliharaan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">List Pemeliharaan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a href="<?= base_url('/pemeliharaan/create') ?>" class="btn btn-primary">
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
                        <div class="row align-items-center">
                            <div class="col">
                                <h5>List Pemeliharaan</h5>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('/pemeliharaan/filter') ?>" class="btn btn-warning">
                                    <i class="fa fa-filter"></i> Filter
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="pemeliharaan" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>harga</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pemeliharaan['pemeliharaan'] as $pemeliharaan):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $pemeliharaan['kode'] ?>
                                        </td>
                                        <td>
                                            <?= $pemeliharaan['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $pemeliharaan['jumlah'] ?>
                                        </td>
                                        <td>
                                            <?= "Rp " . number_format($pemeliharaan['harga'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?= \Carbon\Carbon::parse($pemeliharaan['created_at'])->format('d/m/Y') ?>
                                        </td>
                                        <td>
                                            <?= \Carbon\Carbon::parse($pemeliharaan['created_at'])->format('H:i:s') ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/pemeliharaan/edit/' . $pemeliharaan['id']) ?>"
                                                class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                            <a href="<?= base_url('/pemeliharaan/delete/' . $pemeliharaan['id']) ?>"
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
<script>$('#pemeliharaan').DataTable();</script>

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