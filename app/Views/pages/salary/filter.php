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
                            <h5 class="m-b-10">Data Gaji</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Gaji</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a href="<?= base_url('/salary/create') ?>" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i>Tambah
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
                        <h5>Filter Period Gaji</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/salary/filter') ?>" method="POST">
                            <div class="row">
                                <div class="col">
                                    <input type="month" class="form-control" name="periode">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Gaji</h5>
                    </div>
                    <div class="card-body">
                        <table id="transaksi" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gaji Pokok</th>
                                    <th>Periode Gaji Awal</th>
                                    <th>Periode Gaji After</th>
                                    <th>Lemburan Dibayar</th>
                                    <th>Jumlah Penghasilan</th>
                                    <th>Potongan</th>
                                    <th>Penghasilan Diterima</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($salary['salary'] as $salary):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $salary['employees_name'] ?>
                                        </td>
                                        <td>
                                            <?= "Rp " . number_format($salary['master_salary_nominal'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?= $salary['start_period'] ?>
                                        </td>
                                        <td>
                                            <?= $salary['end_period'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($salary['master_salary_nominal'] == 1500000) {
                                                $totalPm = ((1100000 / 28) * 1.5) * $salary['pm'];
                                            } elseif ($salary['master_salary_nominal'] == 1100000) {
                                                $totalPm = ((1150000 / 28) * 1.5) * $salary['pm'];
                                            } else {
                                                $totalPm = (($salary['master_salary_nominal'] / 28) * 1.5) * $salary['pm'];
                                            }

                                            if ($salary['master_salary_nominal'] == 1500000) {
                                                $totalLs = ((1100000 / 28) * 0.5) * $salary['ls'];
                                            } elseif ($salary['master_salary_nominal'] == 1100000) {
                                                $totalLs = ((1150000 / 28) * 0.5) * $salary['ls'];
                                            } else {
                                                $totalLs = (($salary['master_salary_nominal'] / 28) * 0.5) * $salary['ls'];
                                            }

                                            $totalLembur = $totalPm + $totalLs;
                                            ?>
                                            <?= "Rp " . number_format(round($totalLembur), 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jumlahPenghasilan = $salary['master_salary_nominal'] + round($totalLembur) + $salary['bonus_tunjangan'];
                                            ?>
                                            <?= "Rp " . number_format(round($jumlahPenghasilan), 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?php
                                            $totalBon = $salary['toko'] + $salary['lain_lain'] + $salary['butik'];
                                            $totalAbsen = ($salary['master_salary_nominal'] / 28) * $salary['absen_tidak_hadir'];
                                            $totalPotongan = $totalBon + round($totalAbsen);
                                            ?>
                                            <?= "Rp " . number_format(round($totalPotongan), 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jumlahPenghasilanBefore = round($jumlahPenghasilan) - round($totalPotongan);
                                            $jumlahPenghasilanAfter = round($jumlahPenghasilanBefore);
                                            ?>
                                            <?= "Rp " . number_format(round($jumlahPenghasilanAfter), 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('salary/print-pdf/' . $salary['id']) ?>"
                                                class="btn btn-danger">PDF</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<script>$('#transaksi').DataTable();</script>

<?= $this->endSection(); ?>