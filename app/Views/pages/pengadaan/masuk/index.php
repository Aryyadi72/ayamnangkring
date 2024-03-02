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
                                    <th>Tanggal Masuk</th>
                                    <th>Aksi</th>
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
                                            <?= \Carbon\Carbon::parse($pm['tanggal_masuk'])->format('d/m/Y') ?>
                                        </td>
                                        <td>
                                            <?php if ($pm['status'] == 'Sisa' || $pm['status'] == 'Habis'): ?>
                                                <button class="btn btn-warning" disabled>
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger" disabled>
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            <?php else: ?>
                                                <a href="<?= base_url('/pengadaan-masuk/edit/' . $pm['id']) ?>"
                                                    class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                                <a href="<?= base_url('/pengadaan-masuk/delete/' . $pm['id']) ?>"
                                                    class="btn btn-danger">
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($pm['jumlah'] > 0): ?>
                                                <a href="<?= base_url('/pengadaan-keluar/create/' . $pm['id']) ?>"
                                                    class="btn btn-primary">
                                                    <i class="ti ti-arrow-right"></i>
                                                </a>
                                            <?php else: ?>
                                                <button class="btn btn-primary" disabled>
                                                    <i class="ti ti-arrow-right"></i>
                                                </button>
                                            <?php endif; ?>
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