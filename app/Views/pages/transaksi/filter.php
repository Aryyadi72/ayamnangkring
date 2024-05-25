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
                            <h5 class="m-b-10">Data Transaksi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Transaksi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filter Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('/transaksi/filter') ?>" method="POST">
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" name="periode">
                                </div>
                                <div class="col">
                                    <select class="form-select form-select-sm" aria-label="Default select example"
                                        name="shift">
                                        <option selected disabled>Pilih Shift</option>
                                        <option value="1">Shift 1</option>
                                        <option value="2">Shift 2</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <button class="btn btn-danger" target="blank_">Print PDF</button>
                                </div>
                            </div>
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