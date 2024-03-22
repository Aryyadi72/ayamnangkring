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
                            <li class="breadcrumb-item" aria-current="page">Alat Produksi - Tambah</li>
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
                        <?= form_open_multipart('/alat-produksi/store') ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kode Alat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="kode" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="qty" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status" required>
                                <option selected disabled>Pilih Satuan</option>
                                <option value="LAYAK PAKAI">LAYAK PAKAI</option>
                                <option value="TIDAK LAYAK">TIDAK LAYAK</option>
                                <option value="RUSAK">RUSAK</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Satuan</label>
                            <select class="form-select" aria-label="Default select example" name="satuan" required>
                                <option selected disabled>Pilih Satuan</option>
                                <option value="PCS">PCS</option>
                                <option value="UNIT">UNIT</option>
                                <option value="BUAH">BUAH</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="harga" onkeyup="formatHarga(this)" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar</label>
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

<script>
    function formatHarga(input) {
        var hargaInput = input;
        var harga = hargaInput.value.replace(/\D/g, '');
        var formattedHarga = "Rp. " + formatRupiah(harga);

        hargaInput.value = formattedHarga;
        hargaInput.setAttribute('data-value', harga);
    }

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }
</script>

<?= $this->endSection(); ?>