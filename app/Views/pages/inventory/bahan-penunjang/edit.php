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
                            <h5 class="m-b-10">Bahan Penunjang</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Bahan Penunjang - Edit</li>
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
                        <form action="<?= site_url('/bahan-penunjang/update/' . $bahanPenunjang['bahan']['id']) ?>"
                            method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Bahan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="kode"
                                    value="<?= $bahanPenunjang['bahan']['kode'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Bahan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama"
                                    value="<?= $bahanPenunjang['bahan']['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Qty</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="qty"
                                    value="<?= $bahanPenunjang['bahan']['qty'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Satuan</label>
                                <select class="form-select" aria-label="Default select example" name="satuan">
                                    <option selected disabled>Pilih Satuan</option>
                                    <option value="PCS" <?= ($bahanPenunjang['bahan']['satuan'] == 'PCS') ? 'selected' : ''; ?>>PCS</option>
                                    <option value="UNIT" <?= ($bahanPenunjang['bahan']['satuan'] == 'UNIT') ? 'selected' : ''; ?>>UNIT</option>
                                    <option value="BUAH" <?= ($bahanPenunjang['bahan']['satuan'] == 'BUAH') ? 'selected' : ''; ?>>BUAH</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option selected disabled>Pilih Kategori</option>
                                    <option value="HABIS PAKAI" <?= ($bahanPenunjang['bahan']['kategori'] == 'HABIS PAKAI') ? 'selected' : ''; ?>>HABIS PAKAI</option>
                                    <option value="SEMI PERMANEN" <?= ($bahanPenunjang['bahan']['kategori'] == 'SEMI PERMANEN') ? 'selected' : ''; ?>>SEMI PERMANEN</option>
                                    <option value="PERMANEN" <?= ($bahanPenunjang['bahan']['kategori'] == 'PERMANEN') ? 'selected' : ''; ?>>PERMANEN</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="harga"
                                    value="<?= "Rp " . number_format($bahanPenunjang['bahan']['harga'], 0, ',', '.') ?>"
                                    onkeyup="formatHarga(this)">
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