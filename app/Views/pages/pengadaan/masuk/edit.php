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
                        <form
                            action="<?= site_url('/pengadaan-masuk/update/' . $pengadaanMasuk['pengadaanmasuk']['id']) ?>"
                            method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Bahan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama"
                                    value="<?= $pengadaanMasuk['pengadaanmasuk']['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="jumlah"
                                    value="<?= $pengadaanMasuk['pengadaanmasuk']['jumlah'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="harga"
                                    value="<?= "Rp " . number_format($pengadaanMasuk['pengadaanmasuk']['harga'], 0, ',', '.') ?>"
                                    onkeyup="formatHarga(this)" required>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="status"
                                    value="<?= $pengadaanMasuk['pengadaanmasuk']['status'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis</label>
                                <select class="form-select" aria-label="Default select example" name="jenis">
                                    <option selected disabled>Pilih Jenis</option>
                                    <option value="Bahan Baku" <?= ($pengadaanMasuk['pengadaanmasuk']['jenis'] == 'Bahan Baku') ? 'selected' : ''; ?>>BAHAN BAKU</option>
                                    <option value="Bahan Habis Pakai"
                                        <?= ($pengadaanMasuk['pengadaanmasuk']['jenis'] == 'Bahan Habis Pakai') ? 'selected' : ''; ?>>BAHAN HABIS PAKAI</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kondisi</label>
                                <select class="form-select" aria-label="Default select example" name="kondisi">
                                    <option selected disabled>Pilih Kondisi</option>
                                    <option value="Rusak" <?= ($pengadaanMasuk['pengadaanmasuk']['kondisi'] == 'Rusak') ? 'selected' : ''; ?>>RUSAK</option>
                                    <option value="Bagus" <?= ($pengadaanMasuk['pengadaanmasuk']['kondisi'] == 'Bagus') ? 'selected' : ''; ?>>BAGUS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Masuk</label>
                                <input type="datetime-local" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tanggal_masuk"
                                    value="<?= $pengadaanMasuk['pengadaanmasuk']['tanggal_masuk'] ?>">
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