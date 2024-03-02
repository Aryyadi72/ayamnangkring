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
                                <h5>List Pengadaan Keluar</h5>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('/pengadaan-keluar/filter') ?>" class="btn btn-warning">
                                    <i class="fa fa-filter"></i> Filter
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="pengadaan-keluar" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bahan</th>
                                        <th>Jumlah Keluar</th>
                                        <th>Jenis</th>
                                        <th>Kondisi</th>
                                        <th>Tanggal Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($PengadaanKeluar['pengadaankeluar'] as $pk):
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $pk['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $pk['jumlah_keluar'] ?>
                                            </td>
                                            <td>
                                                <?php if ($pk['jenis'] == 'Bahan Baku'): ?>
                                                    <span class="badge rounded-pill bg-success">BAHAN BAKU</span>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill bg-primary">BAHAN HABIS PAKAI
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($pk['kondisi'] == 'Bagus'): ?>
                                                    <span class="badge rounded-pill bg-success">BAGUS</span>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill bg-danger">RUSAK
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= \Carbon\Carbon::parse($pk['tanggal_keluar'])->format('d/m/Y') ?>
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
    <script>$('#pengadaan-keluar').DataTable();</script>

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