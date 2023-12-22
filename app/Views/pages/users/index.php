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
                <a href="<?= base_url('/data-karyawan-add') ?>" class="btn btn-primary btn-sm">
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
                        <h5>List Users</h5>
                    </div>
                    <div class="card-body">
                    <table id="users" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>Gender</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($data['users'] as $users):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $users['code'] ?></td>
                                <td><?= $users['email'] ?></td>
                                <td><?= $users['username'] ?></td>
                                <td><?= $users['name'] ?></td>
                                <td><?= $users['birth_place'] ?>, <?= \Carbon\Carbon::parse($users['birth_date'])->format('d-m-Y') ?></td>
                                <td><?= $users['gender'] ?></td>
                                <td><?= $users['position'] ?></td>
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
<script>$('#users').DataTable();</script>

<?= $this->endSection();?>