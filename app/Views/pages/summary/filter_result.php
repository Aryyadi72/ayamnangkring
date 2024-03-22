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
            <div class="justify-content-end">
                <a href="<?= base_url('/summary-harian/create') ?>" class="btn btn-primary">
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
                        <div class="row align-items-center">
                            <div class="col">
                                <h5>List Upgrade</h5>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('/pengadaan-masuk/filter') ?>" class="btn btn-warning">
                                    <i class="fa fa-filter"></i> Filter
                                </a>
                                <button id="btn-d" class="btn btn-success"><i class="fa fa-file-excel"></i>
                                    Export</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="summary-harian" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Inputer</th>
                                    <th>Modal Awal</th>
                                    <th>Modal Akhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($summaryHarian['summaryHarian'] as $sh):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= \Carbon\Carbon::parse($sh['created_at'])->format('d/m/Y') ?>
                                        </td>
                                        <td>
                                            <?= \Carbon\Carbon::parse($sh['created_at'])->format('H:i:s') ?>
                                        </td>
                                        <td>
                                            <?= $sh['inputer'] ?>
                                        </td>
                                        <td>
                                            <?= number_format($sh['modal_awal'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?= number_format($sh['modal_akhir'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <!-- <a href="<?= base_url('/summary-harian/edit/' . $sh['id']) ?>"
                                                class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                            <a href="<?= base_url('/summary-harian/delete/' . $sh['id']) ?>"
                                                class="btn btn-danger"><i class="ti ti-trash"></i></a> -->
                                            <a href="<?= base_url('/summary-harian/detail/' . $sh['id']) ?>"
                                                class="btn btn-primary"><i class="ti ti-details"></i></a>
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
<script>$('#ummary-harian').DataTable();</script>
<script src="<?= base_url('assets/js/tableToExcel.js') ?>"></script>

<script>
    $(function () {

        <?php if (session()->has("success")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '<?= session("success") ?>'
            })
        <?php } ?>
    });
</script>

<script>
    // Tambahkan event listener untuk tombol
    document.getElementById('btn-d').addEventListener('click', function () {
        // Panggil fungsi konversi TableToExcel
        TableToExcel.convert(document.getElementById('ummary-harian'), {
            // Gunakan sintaks PHP untuk membangun nama file
            name: "<?= $start_periode ?> - <?= $end_periode ?> Laporan Summary Harian .xlsx",
        });
    });
</script>

<?= $this->endSection(); ?>