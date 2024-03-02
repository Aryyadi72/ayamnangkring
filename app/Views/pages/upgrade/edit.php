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
                            <h5 class="m-b-10">Upgarde</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Upgarde - Tambah</li>
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
                        <h5>Ubah Upgarde</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/upgrade/update/' . $upgrade['upgrade']['id']) ?>" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama" value="<?= $upgrade['upgrade']['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="jumlah"
                                    value="<?= $upgrade['upgrade']['jumlah'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="harga" onkeyup="formatHarga(this)"
                                    value="<?= $upgrade['upgrade']['harga'] ?>">
                            </div>
                            <a href="<?= base_url('/upgrade') ?>" class="btn btn-dark">Kembali</a>
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