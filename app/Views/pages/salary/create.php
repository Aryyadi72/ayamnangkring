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
                            <h5 class="m-b-10">Input Data Gaji - Data Gaji</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Gaji - Input</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a href="<?= base_url('/salary') ?>" class="btn btn-warning">
                    <i class="ti ti-left-arrow"></i>Kembali
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
                        <h5>Input Data Gaji</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/salary/store') ?>" method="POST">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Tanggal</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control form-control" name="end_period" required>
                                </div>
                            </div>
                            <br><br>
                            <h4>Penghasilan</h4><br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Nama</th>
                                            <th rowspan="2">Gaji</th>
                                            <th rowspan="2">Bonus + Tunjangan</th>
                                            <th rowspan="2">Tambahan Tugas</th>
                                            <th colspan="2">Lemburan Dibayar</th>
                                            <th rowspan="2">Total</th>
                                        </tr>
                                        <tr>
                                            <th>PM</th>
                                            <th>LS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($sdm['employees'] as $emp):
                                            ?>
                                            <tr class="employee-row">
                                                <td class="text-center">
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="emp_code[]" value="<?= $emp['id'] ?>">
                                                    <input class="form-control" type="text" value="<?= $emp['name'] ?>"
                                                        disabled>
                                                </td>
                                                <td>
                                                    <select class="form-select gaji" name="gaji[]"
                                                        oninput="calculateTotal(this); calculateTotalAbsen(this)" required>
                                                        <option selected disabled>Pilih Gaji</option>
                                                        <?php foreach ($sm['salary'] as $s): ?>
                                                            <option value="<?= $s['id'] ?>">
                                                                <?= "Rp. " . number_format($s['nominal'], 0, ',', '.') ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </td>
                                                <td><input class="form-control bonus" type="text" name="bonus_tunjangan[]"
                                                        oninput="calculateTotal(this)" onkeyup="formatBonus(this)" required>
                                                </td>
                                                <td><input class="form-control tambahan" type="text" name="tambahan_tugas[]"
                                                        oninput="calculateTotal(this)" onkeyup="formatTambahan(this)"
                                                        required>
                                                </td>
                                                <td><input class="form-control lemburan-pm" type="number"
                                                        name="lemburan_pm[]" oninput="calculateTotal(this)" required>
                                                </td>
                                                <td><input class="form-control lemburan-ls" type="number"
                                                        name="lemburan_ls[]" oninput="calculateTotal(this)" required>
                                                </td>
                                                <td><input type="text" name="total" class="form-control total" disabled>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <br><br>

                            <h4>Potongan</h4><br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Nama</th>
                                            <th colspan="3">Bon</th>
                                            <th colspan="1">Sub Total Potongan</th>
                                            <th rowspan="2">Absen / Tidak Hadir (Hari)</th>
                                            <!-- <th rowspan="2">Total Potongan</th> -->
                                        </tr>
                                        <tr>
                                            <th>Butik</th>
                                            <th>Toko</th>
                                            <th>Lain-lain</th>
                                            <th>Bon</th>
                                            <!-- <th>Absen/Tidak Hadir</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($sdm['employees'] as $emp):
                                            ?>
                                            <tr class="employee-row-potongan">
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" value="<?= $emp['name'] ?>"
                                                        disabled>
                                                </td>
                                                <td><input class="form-control butik" type="text"
                                                        onkeyup="formatButik(this)"
                                                        oninput="calculateTotalBon(this); calculateTotalPotongan(this)"
                                                        name="bon_butik[]" value="" required>
                                                </td>
                                                <td><input class="form-control toko" type="text"
                                                        oninput="calculateTotalBon(this); calculateTotalPotongan(this)"
                                                        onkeyup="formatToko(this)" name="bon_toko[]" value="" required>
                                                </td>
                                                <td><input class="form-control lain" type="text"
                                                        oninput="calculateTotalBon(this); calculateTotalPotongan(this)"
                                                        onkeyup="formatLain(this)" name="bon_lain[]" value="" required>
                                                </td>
                                                <td><input class="form-control totalBon" type="text" name="totalBon"
                                                        disabled>
                                                </td>
                                                <td><input class="form-control absen-hari" type="number" name="absen_hari[]"
                                                        value=""
                                                        oninput="calculateTotalAbsen(this); calculateTotalPotongan(this)"
                                                        required>
                                                </td>
                                                <!-- <td><input class="form-control totalAbsen" name="totalAbsen" type="text"
                                                        disabled>
                                                </td> -->
                                                <!-- <td><input class="form-control totalPotongan" name="totalPotongan"
                                                        type="text" disabled>
                                                </td> -->
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
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

<!-- Bonus -->
<script>
    function formatBonus(input) {
        var bonusInput = input;
        var bonus = bonusInput.value.replace(/\D/g, '');
        var formattedBonus = "Rp. " + formatRupiah(bonus);

        bonusInput.value = formattedBonus;
        bonusInput.setAttribute('data-value', bonus);
    }
</script>

<!-- Tambahan -->
<script>
    function formatTambahan(input) {
        var tambahanInput = input;
        var tambahan = tambahanInput.value.replace(/\D/g, '');
        var formattedTambahan = "Rp. " + formatRupiah(tambahan);

        tambahanInput.value = formattedTambahan;
        tambahanInput.setAttribute('data-value', tambahan);
    }
</script>

<!-- Butik -->
<script>
    function formatButik(input) {
        var butikInput = input;
        var butik = butikInput.value.replace(/\D/g, '');
        var formattedButik = "Rp. " + formatRupiah(butik);

        butikInput.value = formattedButik;
        butikInput.setAttribute('data-value', butik);
    }
</script>

<!-- Toko -->
<script>
    function formatToko(input) {
        var tokoInput = input;
        var toko = tokoInput.value.replace(/\D/g, '');
        var formattedToko = "Rp. " + formatRupiah(toko);

        tokoInput.value = formattedToko;
        tokoInput.setAttribute('data-value', toko);
    }
</script>

<!-- Lain-lain -->
<script>
    function formatLain(input) {
        var lainInput = input;
        var lain = lainInput.value.replace(/\D/g, '');
        var formattedLain = "Rp. " + formatRupiah(lain);

        lainInput.value = formattedLain;
        lainInput.setAttribute('data-value', lain);
    }
</script>

<!-- Total Bon -->
<script>
    function calculateTotalBon(input) {
        var row = input.closest('.employee-row-potongan');
        var butik = parseFloat(row.querySelector('.butik').value.replace(/\D/g, ''));
        var toko = parseFloat(row.querySelector('.toko').value.replace(/\D/g, ''));
        var lain = parseFloat(row.querySelector('.lain').value.replace(/\D/g, ''));

        var totalBon = butik + toko + lain;

        row.querySelector('.totalBon').value = "Rp. " + formatRupiah(Math.round(totalBon).toString());
    }
</script>

<!-- Total Absen -->
<script>
    function calculateTotalAbsen(input) {
        var row = input.closest('.employee-row-potongan');
        var absen = parseInt(row.querySelector('.absen-hari').value);

        var employeeRow = input.closest('.pc-container').querySelector('.employee-row');
        var gajiSelect = employeeRow.querySelector('.gaji');
        var gajiIndex = gajiSelect.selectedIndex;
        var gaji = parseFloat(gajiSelect.options[gajiIndex].text.replace(/\D/g, ''));

        var modified_absen;
        if (gaji === 1500000) {
            modified_absen = (1100000 / 28) * absen;
        } else {
            modified_absen = (gaji / 28) * absen;
        }

        var totalAbsen = modified_absen;

        row.querySelector('.totalAbsen').value = "Rp. " + formatRupiah(Math.round(totalAbsen).toString());
    }
</script>

<!-- Total Potongan -->
<script>
    function calculateTotalPotongan(input) {
        var row = input.closest('.employee-row-potongan');
        var butik = parseFloat(row.querySelector('.butik').value.replace(/\D/g, ''));
        var toko = parseFloat(row.querySelector('.toko').value.replace(/\D/g, ''));
        var lain = parseFloat(row.querySelector('.lain').value.replace(/\D/g, ''));
        var absen = parseInt(row.querySelector('.absen-hari').value);

        var gajiRow = document.querySelector('.employee-row');
        var gajiSelect = gajiRow.querySelector('.gaji');
        var gajiIndex = gajiSelect.selectedIndex;
        var gaji = parseFloat(gajiSelect.options[gajiIndex].text.replace(/\D/g, ''));

        var modified_absen;
        if (gaji === 1500000) {
            modified_absen = (1100000 / 28) * absen;
        } else {
            modified_absen = (gaji / 28) * absen;
        }

        var totalPotongan = butik + toko + lain + modified_absen;

        row.querySelector('.totalPotongan').value = "Rp. " + formatRupiah(Math.round(totalPotongan).toString());
    }
</script>

<!-- Total Penghasilan -->
<script>
    function calculateTotal(input) {
        var row = input.closest('.employee-row');
        var bonus = parseFloat(row.querySelector('.bonus').value.replace(/\D/g, ''));
        var tambahan = parseFloat(row.querySelector('.tambahan').value.replace(/\D/g, ''));
        var lemburan_pm = parseInt(row.querySelector('.lemburan-pm').value);
        var lemburan_ls = parseInt(row.querySelector('.lemburan-ls').value);

        var gajiSelect = row.querySelector('.gaji');
        var gajiIndex = gajiSelect.selectedIndex;
        var gaji = parseFloat(gajiSelect.options[gajiIndex].text.replace(/\D/g, ''));

        var modified_pm;
        if (gaji === 1500000) {
            modified_pm = ((1100000 / 28) * 1.5) * lemburan_pm;
        } else if (gaji === 1100000) {
            modified_pm = ((1150000 / 28) * 1.5) * lemburan_pm;
        } else {
            modified_pm = ((gaji / 28) * 1.5) * lemburan_pm;
        }

        var modified_ls;
        if (gaji === 1500000) {
            modified_ls = ((1100000 / 28) * 0.5) * lemburan_ls;
        } else if (gaji === 1100000) {
            modified_ls = ((1150000 / 28) * 0.5) * lemburan_ls;
        } else {
            modified_ls = ((gaji / 28) * 0.5) * lemburan_ls;
        }

        var total = gaji + bonus + tambahan + modified_pm + modified_ls;

        row.querySelector('.total').value = "Rp. " + formatRupiah(Math.round(total).toString());
    }

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }
</script>

<?= $this->endSection(); ?>