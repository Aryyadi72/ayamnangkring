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
                            <h5 class="m-b-10">Data Karyawan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Karyawan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a href="<?= base_url('/employees/create') ?>" class="btn btn-primary">
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
                        <h5>List Data Karyawan</h5>
                    </div>
                    <div class="card-body">
                        <table id="employees" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Gender</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($sdm['employees'] as $emp):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $emp['code'] ?>
                                        </td>
                                        <td>
                                            <?= $emp['name'] ?>
                                        </td>
                                        <td>
                                            <?= $emp['birth_place'] ?>,
                                            <?= \Carbon\Carbon::parse($emp['birth_date'])->format('d-m-Y') ?>
                                        </td>
                                        <td>
                                            <?= $emp['gender'] ?>
                                        </td>
                                        <td>
                                            <?= $emp['position'] ?>
                                        </td>
                                        <td>
                                            <?php if ($emp['active'] == 'YES'): ?>
                                                <span class="badge rounded-pill bg-success">AKTIF</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill bg-danger">TIDAK AKTIF
                                                </span>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <a href="<?= base_url('/employees/edit/' . $emp['id']) ?>"
                                                class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Edit"><i class="ti ti-pencil"></i></a>
                                            <a href="<?= base_url('/employees/delete/' . $emp['id']) ?>"
                                                class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Hapus"><i class="ti ti-trash"></i></a>
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
<script>$('#employees').DataTable();</script>

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