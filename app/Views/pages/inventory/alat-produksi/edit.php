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
                            <h5 class="m-b-10">Alat Produksi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Alat Produksi - Edit</li>
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
                        <h5>Tambah Alat Produksi</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/alat-produksi/update/' . $alatProduksi['alat']['id']) ?>"
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?= $alatProduksi['alat']['id'] ?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alat</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama"
                                    value="<?= $alatProduksi['alat']['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Qty</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="qty" value="<?= $alatProduksi['alat']['qty'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected disabled>Pilih Satuan</option>
                                    <option value="LAYAK PAKAI" <?= ($alatProduksi['alat']['status'] == 'LAYAK PAKAI') ? 'selected' : ''; ?>>LAYAK PAKAI</option>
                                    <option value="TIDAK LAYAK" <?= ($alatProduksi['alat']['status'] == 'TIDAK LAYAK') ? 'selected' : ''; ?>>TIDAK LAYAK</option>
                                    <option value="RUSAK" <?= ($alatProduksi['alat']['status'] == 'RUSAK') ? 'selected' : ''; ?>>RUSAK</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Satuan</label>
                                <select class="form-select" aria-label="Default select example" name="satuan">
                                    <option selected disabled>Pilih Satuan</option>
                                    <option value="PCS" <?= ($alatProduksi['alat']['satuan'] == 'PCS') ? 'selected' : ''; ?>>PCS</option>
                                    <option value="UNIT" <?= ($alatProduksi['alat']['satuan'] == 'UNIT') ? 'selected' : ''; ?>>UNIT</option>
                                    <option value="BUAH" <?= ($alatProduksi['alat']['satuan'] == 'BUAH') ? 'selected' : ''; ?>>BUAH</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="harga"
                                    value="<?= $alatProduksi['alat']['harga'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar</label>
                                <?php if (!empty($alatProduksi['alat']['image'])): ?>
                                    <div>
                                        <img src="<?= base_url('uploads/alat_produksi/' . $alatProduksi['alat']['image']) ?>"
                                            alt="Foto Barang" width="100">
                                    </div>
                                <?php else: ?>
                                    <span>No Image</span>
                                <?php endif; ?>
                                <input class="form-control" type="file" name="image" accept="image/*">
                            </div>
                            <a href="<?= base_url('/alat-produksi') ?>" class="btn btn-dark">Kembali</a>
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