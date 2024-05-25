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
                            <h5 class="m-b-10">Summary Harian</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah Summary Harian</li>
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
                        <h5>Tambah Summary Harian</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/summary-harian/store') ?>" method="POST">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($PengadaanMasuk['pengadaanmasuk'] as $pm): ?>
                                        <tr>
                                            <td>Pengadaan Masuk</td>
                                            <td>
                                                <?= $pm['nama'] ?>
                                            </td>
                                            <td>
                                                <?= number_format($pm['harga'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                    <?php foreach ($Pemeliharaan['pemeliharaan'] as $pemeliharaan): ?>
                                        <tr>
                                            <td>Pemeliharaan</td>
                                            <td>
                                                <?= $pemeliharaan['nama'] ?>
                                            </td>
                                            <td>
                                                <?= number_format($pemeliharaan['harga'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                    <?php foreach ($Upgrade['upgrade'] as $up): ?>
                                        <tr>
                                            <td>Upgrade</td>
                                            <td>
                                                <?= $up['nama'] ?>
                                            </td>
                                            <td>
                                                <?= number_format($up['harga'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                    <?php foreach ($BahanPenunjang['bahanPenunjang'] as $bp): ?>
                                        <tr>
                                            <td>Bahan Penunjang</td>
                                            <td>
                                                <?= $bp['nama'] ?>
                                            </td>
                                            <td>
                                                <?= number_format($bp['harga'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                    <?php foreach ($AlatProduksi['alatProduksi'] as $ap): ?>
                                        <tr>
                                            <td>Alat Produksi</td>
                                            <td>
                                                <?= $ap['nama'] ?>
                                            </td>
                                            <td>
                                                <?= number_format($ap['harga'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td colspan="2">Total</td>
                                        <td>
                                            <input type="text" class="form-control" name="total_today" id=""
                                                value="<?= number_format($total, 0, ',', '.') ?>" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <br>
                            <input type="hidden" name="start_periode" id="" value="<?= $start_periode ?>">
                            <input type="hidden" name="end_periode" id="" value="<?= $end_periode ?>">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Modal Awal</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="modal_awal" onkeyup="formatHarga(this)"
                                    value="<?= number_format($nilaiField, 0, ',', '.') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Modal Akhir</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="modal_akhir" onkeyup="formatHarga(this)"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cash</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="cash" onkeyup="formatHarga(this)" required
                                    value="<?= number_format($totalTunaiPrice, 0, ',', '.') ?>">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tunai</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tunai" onkeyup="formatHarga(this)" required>
                            </div> -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Transfer</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tf" onkeyup="formatHarga(this)" required
                                    value="<?= number_format($totalTransferPrice, 0, ',', '.') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NS</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="ns" onkeyup="formatHarga(this)" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Pembuat</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="inputer" required>
                            </div>
                            <a href="<?= base_url('/summary-harian') ?>" class="btn btn-dark">Kembali</a>
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
        var formattedHarga = formatRupiah(harga);

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

<script>
    $(function () {
        $('.table-data').on('click', '.btn-add', function () {
            var $tr = $(this).closest('.tr-clone');
            var $clone = $tr.clone();
            $clone.find(':text').val('');
            $tr.after($clone);
        });
        $('.table-data').on('click', '.btn-remove', function () {
            var $tr = $(this).closest('.tr-clone');
            var $clone = $tr.clone();
            $clone.find(':text').val('');
            $tr.remove();
        });
    })
</script>

<?= $this->endSection(); ?>