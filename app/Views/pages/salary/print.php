<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF CodeIgniter 4 - qadrLabs</title>
    <style>
        @page {
            margin-top: 0px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }

        body {
            margin-top: 0px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }

        img {
            width: 50px;
            height: auto;
        }

        h5 {
            margin-top: 10px;
            margin-bottom: 5px;
            font-style: italic;
        }

        .container {
            display: flex;
            align-items: center;
        }

        .image {
            margin-right: 20px;
        }

        .title h4 {
            margin: 10;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 11px;
            border: 1px solid #000;
        }

        th,
        td {
            border: 1px solid #000;
            text-align: left;
            padding: 3px;
        }

        /* CSS khusus untuk tabel tanpa border */
        .no-border-table {
            border-collapse: collapse;
            border: 0px solid #000;
            width: 100%;
            font-size: 11px;
        }

        .no-border-table th,
        .no-border-table td {
            border: none;
            /* Menghilangkan border */
            text-align: left;
            padding: 3px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image">
            <img src="<?= site_url('assets/images/logo_ayam_nangkring.jpg') ?>" alt="">
        </div>
        <div class="title">
            <h4>SLIP GAJI KARYAWAN <br> RM. AYAM NANGKRING</h4>
        </div>
    </div>
    <table class="no-border-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th style="text-align: center;">:</th>
                <th>
                    <?= $salaryData['employees_name'] ?>
                </th>
                <th style="text-align: right;">
                    <?= $salaryData['employees_code'] ?>
                </th>
            </tr>
            <tr>
                <th>Periode Gaji</th>
                <th style="text-align: center;">:</th>
                <th>
                    <?= \Carbon\Carbon::createFromFormat('Y-m-d', $salaryData['start_period'])->format('d-m-Y') ?> -
                    <?= \Carbon\Carbon::createFromFormat('Y-m-d', $salaryData['end_period'])->format('d-m-Y') ?>
                </th>
            </tr>
        </thead>
    </table>
    <h5>PENGHASILAN :</h5>
    <?php
    if ($salaryData['master_salary_nominal'] == 1500000) {
        $totalPm = ((1100000 / 28) * 1.5) * $salaryData['pm'];
    } elseif ($salaryData['master_salary_nominal'] == 1100000) {
        $totalPm = ((1150000 / 28) * 1.5) * $salaryData['pm'];
    } else {
        $totalPm = (($salaryData['master_salary_nominal'] / 28) * 1.5) * $salaryData['pm'];
    }

    if ($salaryData['master_salary_nominal'] == 1500000) {
        $totalLs = ((1100000 / 28) * 0.5) * $salaryData['ls'];
    } elseif ($salaryData['master_salary_nominal'] == 1100000) {
        $totalLs = ((1150000 / 28) * 0.5) * $salaryData['ls'];
    } else {
        $totalLs = (($salaryData['master_salary_nominal'] / 28) * 0.5) * $salaryData['ls'];
    }

    $totalLembur = $totalPm + $totalLs;
    ?>
    <table>
        <thead>
            <tr>
                <th>GAJI</th>
                <th></th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format($salaryData['master_salary_nominal'], 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>LEMBURAN DIBAYAR</th>
                <th></th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($totalLembur), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>PM</th>
                <th style="text-align: center;">
                    <?= $salaryData['pm'] ?>
                </th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($totalPm), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>LS</th>
                <th style="text-align: center;">
                    <?= $salaryData['ls'] ?>
                </th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($totalLs), 0, ',', '.') ?>
                </th>
            </tr>
        </thead>
    </table>
    <?php
    $jumlahPenghasilan = $salaryData['master_salary_nominal'] + round($totalLembur) + $salaryData['bonus_tunjangan'] + $salaryData['tambahan_tugas'];
    ?>
    <table style="margin-top:5px;">
        <thead>
            <tr>
                <th>Bonus + Tunjangan</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($salaryData['bonus_tunjangan']), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>Tambahan Tugas</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($salaryData['tambahan_tugas']), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>JUMLAH</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($jumlahPenghasilan), 0, ',', '.') ?>
                </th>
            </tr>
        </thead>
    </table>
    <h5>POTONGAN :</h5>
    <?php
    if ($salaryData['master_salary_nominal'] == 1500000) {
        $absenNominal = (1100000 / 28) * $salaryData['absen_tidak_hadir'];
    } else {
        $absenNominal = ($salaryData['master_salary_nominal'] / 28) * $salaryData['absen_tidak_hadir'];
    }
    $totalBon = $salaryData['toko'] + $salaryData['lain_lain'] + $salaryData['butik'];
    $totalPotongan = $totalBon + round($absenNominal);
    ?>
    <table>
        <thead>
            <tr>
                <th>BON</th>
                <th></th>
                <th></th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($totalBon), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>ABSEN / TIDAK HADIR</th>
                <th style="text-align: center;">
                    <?= $salaryData['absen_tidak_hadir'] ?>
                </th>
                <th style="text-align: center;">Hari</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($absenNominal), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>JUMLAH</th>
                <th></th>
                <th></th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($totalPotongan), 0, ',', '.') ?>
                </th>
            </tr>
        </thead>
    </table>
    <?php
    $jumlahPenghasilanBefore = $jumlahPenghasilan - $totalPotongan;
    $jumlahPenghasilanAfter = round($jumlahPenghasilanBefore, -4);
    $pembulatan = $jumlahPenghasilanAfter - $jumlahPenghasilanBefore;

    // $targetRounding = $_POST['target_rounding'];
    // $jumlahPenghasilanBefore = $jumlahPenghasilan - $totalPotongan;
    // $jumlahPenghasilanAfter = ceil($jumlahPenghasilanBefore / $targetRounding) * $targetRounding;
    // $pembulatan = $jumlahPenghasilanAfter - $jumlahPenghasilanBefore;
    ?>
    <table style="margin-top:5px;">
        <thead>
            <tr>
                <th>JUMLAH PENGHASILAN - POTONGAN</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($jumlahPenghasilanBefore), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>PEMBULATAN</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($pembulatan), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th>PENGHASILAN DITERIMA</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format($jumlahPenghasilanAfter, 0, ',', '.') ?>
                </th>
            </tr>
        </thead>
    </table>
    <table style="margin-top:5px;" class="no-border-table">
        <thead>
            <tr>
                <th style="text-align: right;">Bon</th>
                <th style="text-align: center;">:</th>
            </tr>
            <tr>
                <th style="text-align: right;">Toko</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($salaryData['toko']), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th style="text-align: right;">Butik</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($salaryData['butik']), 0, ',', '.') ?>
                </th>
            </tr>
            <tr>
                <th style="text-align: right;">Lain-lain</th>
                <th style="text-align: center;">:</th>
                <th style="text-align: right;">
                    <?= number_format(round($salaryData['lain_lain']), 0, ',', '.') ?>
                </th>
            </tr>
        </thead>
    </table>
</body>

<script>
    window.onload = function () {
        window.print();
    };
</script>

</html>