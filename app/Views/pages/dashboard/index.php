<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content'); ?>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-xl-4 col-md-6">
                <div class="card bg-secondary-dark dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="text-white d-block f-34 f-w-500 my-2">1350 <i
                                        class="ti ti-arrow-up-right-circle opacity-50"></i></span>
                            </div>
                            <div class="col-auto">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="text-white ti ti-coin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 opacity-50">Jumlah yang Terjual</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary-dark dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="text-white d-block f-34 f-w-500 my-2">1350 <i
                                        class="ti ti-arrow-up-right-circle opacity-50"></i></span>
                            </div>
                            <div class="col-auto">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="text-white ti ti-coffee"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 opacity-50">Jumlah Barang Habis Pakai</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="text-white d-block f-34 f-w-500 my-2">1350 <i
                                        class="ti ti-arrow-up-right-circle opacity-50"></i></span>
                            </div>
                            <div class="col-auto">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="text-white ti ti-man"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 opacity-50">Jumlah Data Pengunjung</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-4 col-md-6">
                <div class="card bg-primary-dark dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg">
                                    <i class="text-white ti ti-credit-card"></i>
                                </div>
                            </div>
                            <div class="col-auto">
                                <ul class="nav nav-pills justify-content-end mb-0" id="chart-tab-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-white active" id="chart-tab-home-tab"
                                            data-bs-toggle="pill" data-bs-target="#chart-tab-home" type="button"
                                            role="tab" aria-controls="chart-tab-home"
                                            aria-selected="true">Month</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-white" id="chart-tab-profile-tab"
                                            data-bs-toggle="pill" data-bs-target="#chart-tab-profile" type="button"
                                            role="tab" aria-controls="chart-tab-profile"
                                            aria-selected="false">Year</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="chart-tab-tabContent">
                            <div class="tab-pane show active" id="chart-tab-home" role="tabpanel"
                                aria-labelledby="chart-tab-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="text-white d-block f-34 f-w-500 my-2">$130<i
                                                class="ti ti-arrow-up-right-circle opacity-50"></i></span>
                                        <p class="mb-0 opacity-50">Total Earning</p>
                                    </div>
                                    <div class="col-6">
                                        <div id="tab-chart-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="chart-tab-profile" role="tabpanel"
                                aria-labelledby="chart-tab-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="text-white d-block f-34 f-w-500 my-2">$29961 <i
                                                class="ti ti-arrow-down-right-circle opacity-50"></i></span>
                                        <p class="mb-0 opacity-50">C/W Last Year</p>
                                    </div>
                                    <div class="col-6">
                                        <div id="tab-chart-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-4 col-md-6">
                <div class="card bg-warning dashnum-card text-white overflow-hidden">
                    <span class="round small"></span>
                    <span class="round big"></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="avtar avtar-lg">
                                    <i class="text-dark ti ti-credit-card"></i>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group">
                                    <a type="button" class="avtar bg-warning dropdown-toggle arrow-none"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><button class="dropdown-item" type="button">Import Card</button></li>
                                        <li><button class="dropdown-item" type="button">Export</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="chart-tab-tabContent">
                            <div class="tab-pane show active" id="chart-tab-home" role="tabpanel"
                                aria-labelledby="chart-tab-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="text-white d-block f-34 f-w-500 my-2">$130<i
                                                class="ti ti-arrow-up-right-circle opacity-50"></i></span>
                                        <p class="mb-0 opacity-50">Total Earning</p>
                                    </div>
                                    <div class="col-6">
                                        <div id="tab-chart-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="chart-tab-profile" role="tabpanel"
                                aria-labelledby="chart-tab-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="text-white d-block f-34 f-w-500 my-2">$29961 <i
                                                class="ti ti-arrow-down-right-circle opacity-50"></i></span>
                                        <p class="mb-0 opacity-50">C/W Last Year</p>
                                    </div>
                                    <div class="col-6">
                                        <div id="tab-chart-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            <div class="col">
                                <div class="text-center">
                                    <h4>Jumlah Terjual Dibanding Stok</h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <select class="form-select p-r-35">
                                    <option>Today</option>
                                    <option selected>This Month</option>
                                    <option>This Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="column-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            <div class="col-auto">
                                <select class="form-select p-r-35">
                                    <option>Today</option>
                                    <option selected>This Month</option>
                                    <option>This Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="line-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            <div class="col">
                                <div class="text-center">
                                    <h4>Kategori Penjualan Per Hari</h4>
                                </div>
                            </div>
                            <div class="col-auto">
                                <select class="form-select p-r-35">
                                    <option>Today</option>
                                    <option selected>This Month</option>
                                    <option>This Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="column-chart-1"></div>
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
<?= $this->endSection(); ?>