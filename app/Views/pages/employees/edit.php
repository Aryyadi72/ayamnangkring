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
                            <h5 class="m-b-10">Ubah Data Karyawan - Data Karyawan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Karyawan - Ubah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ubah Data Karyawan</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/employees/update/' . $sdm['employees']['id']) ?>" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">User ID</label>
                                <select class="form-select" aria-label="Default select example" name="users_id">
                                    <option selected disabled>Pilih User ID</option>
                                    <?php foreach ($user['user'] as $user): ?>
                                        <option value="<?= $user['id'] ?>" <?= ($sdm['employees']['users_id'] == $user['id']) ? 'selected' : ''; ?>>
                                            <?= $user['username'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Code</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="code" value="<?= $sdm['employees']['code'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name" value="<?= $sdm['employees']['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="birth_place"
                                    value="<?= $sdm['employees']['birth_place'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="birth_date"
                                    value="<?= $sdm['employees']['birth_date'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" name="gender">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Male" <?= ($sdm['employees']['gender'] == 'Male') ? 'selected' : ''; ?>>
                                        Pria</option>
                                    <option value="Female" <?= ($sdm['employees']['gender'] == 'Female') ? 'selected' : ''; ?>>Wanita</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Posisi</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="position"
                                    value="<?= $sdm['employees']['position'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="active">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="YES" <?= ($sdm['employees']['active'] == 'YES') ? 'selected' : ''; ?>>
                                        AKTIF</option>
                                    <option value="NO" <?= ($sdm['employees']['active'] == 'NO') ? 'selected' : ''; ?>>
                                        TIDAK AKTIF</option>
                                </select>
                            </div>
                            <a href="<?= base_url('/data-karyawan') ?>" class="btn btn-dark">Kembali</a>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?= $this->endSection(); ?>