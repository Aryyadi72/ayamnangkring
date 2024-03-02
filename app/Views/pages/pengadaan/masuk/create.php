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
                            <h5 class="m-b-10">Pengadaan Harian</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Bahan Baku Masuk - Tambah</li>
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
                        <h5>Tambah Pengadaan Masuk</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/pengadaan-masuk/store') ?>" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Bahan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="jumlah" required>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="status" value="Tersedia">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis</label>
                                <select class="form-select" aria-label="Default select example" name="jenis" required>
                                    <option selected disabled>Pilih Jenis</option>
                                    <option value="Bahan Baku">BAHAN BAKU</option>
                                    <option value="Bahan Habis Pakai">BAHAN HABIS PAKAI</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kondisi</label>
                                <select class="form-select" aria-label="Default select example" name="kondisi" required>
                                    <option selected disabled>Pilih Kondisi</option>
                                    <option value="Rusak">RUSAK</option>
                                    <option value="Bagus">BAGUS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tanggal_masuk" required>
                            </div>
                            <a href="<?= base_url('/pengadaan-masuk') ?>" class="btn btn-dark">Kembali</a>
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