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
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Bahan Penunjang</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/bahan-penunjang/update/' . $data['bahan_penunjang']['id']) ?>" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Bahan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="<?= $data['bahan_penunjang']['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Qty</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="qty" value="<?= $data['bahan_penunjang']['qty'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Satuan</label>
                                <select class="form-select" aria-label="Default select example" name="satuan">
                                    <option selected disabled>Pilih Satuan</option>
                                    <option value="PCS" <?= ($data['bahan_penunjang']['satuan'] == 'PCS') ? 'selected' : ''; ?>>PCS</option>
                                    <option value="UNIT" <?= ($data['bahan_penunjang']['satuan'] == 'UNIT') ? 'selected' : ''; ?>>UNIT</option>
                                    <option value="BUAH" <?= ($data['bahan_penunjang']['satuan'] == 'BUAH') ? 'selected' : ''; ?>>BUAH</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option selected disabled>Pilih Kategori</option>
                                    <option value="HABIS PAKAI" <?= ($data['bahan_penunjang']['kategori'] == 'HABIS PAKAI') ? 'selected' : ''; ?>>HABIS PAKAI</option>
                                    <option value="SEMI PERMANEN" <?= ($data['bahan_penunjang']['kategori'] == 'SEMI PERMANEN') ? 'selected' : ''; ?>>SEMI PERMANEN</option>
                                    <option value="PERMANEN" <?= ($data['bahan_penunjang']['kategori'] == 'PERMANEN') ? 'selected' : ''; ?>>PERMANEN</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga" value="<?= $data['bahan_penunjang']['harga'] ?>">
                            </div>
                            <a href="<?= base_url('/bahan-penunjang') ?>" class="btn btn-dark">Kembali</a>
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