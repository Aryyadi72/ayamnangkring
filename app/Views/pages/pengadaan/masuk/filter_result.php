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
                <a href="<?= base_url('/pengadaan-masuk/create') ?>" class="btn btn-primary">
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
                                <h5>List Pengadaan Masuk</h5>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('/pengadaan-masuk/filter') ?>" class="btn btn-warning">
                                    <i class="fa fa-filter"></i> Filter
                                </a>
                                <button id="btn-d" class="btn btn-success"><i class="fa fa-file-excel"></i>
                                    Export</button>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <table id="pengadaan-masuk" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bahan</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Jenis</th>
                                    <th>Kondisi</th>
                                    <th>Harga</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jam Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($PengadaanMasuk['pengadaanmasuk'] as $pm):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $pm['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $pm['jumlah'] ?>
                                        </td>
                                        <td>
                                            <?php if ($pm['status'] == 'Tersedia'): ?>
                                                <span class="badge rounded-pill bg-success">TERSEDIA</span>
                                            <?php elseif ($pm['status'] == 'Sisa'): ?>
                                                <span class="badge rounded-pill bg-warning">SISA
                                                </span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill bg-danger">HABIS
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($pm['jenis'] == 'Bahan Baku'): ?>
                                                <span class="badge rounded-pill bg-success">BAHAN BAKU</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill bg-primary">BAHAN HABIS PAKAI
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($pm['kondisi'] == 'Bagus'): ?>
                                                <span class="badge rounded-pill bg-success">BAGUS</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill bg-danger">RUSAK
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= "Rp " . number_format($pm['harga'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?= \Carbon\Carbon::parse($pm['tanggal_masuk'])->format('d/m/Y') ?>
                                        </td>
                                        <td>
                                            <?= \Carbon\Carbon::parse($pm['tanggal_masuk'])->format('H:i:s') ?>
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
<script>$('#pengadaan-masuk').DataTable();</script>
<script src="<?= base_url('assets/js/tableToExcel.js') ?>"></script>

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

<script>
    // Tambahkan event listener untuk tombol
    document.getElementById('btn-d').addEventListener('click', function () {
        // Panggil fungsi konversi TableToExcel
        TableToExcel.convert(document.getElementById('pengadaan-masuk'), {
            // Gunakan sintaks PHP untuk membangun nama file
            name: "<?= $start_periode ?> - <?= $end_periode ?> Laporan Pengadaan Masuk .xlsx",
        });
    });
</script>

<?= $this->endSection(); ?>