<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="index.html" class="b-brand">
                <!-- ========   Change your logo from here   ============ -->
                <img src="../assets/images/logo-dark.svg" alt="" class="logo logo-lg" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">

                <!-- Dashboard -->
                <li class="pc-item pc-caption">
                    <label>Main</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/dashboard') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-dashboard"></i></span><span
                        class="pc-mtext">Dashboard</span></a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-meat"></i></span><span
                        class="pc-mtext">Produk</span><span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="<?= base_url('/produk/produk-table') ?>">Table View</a></li>
                        <li class="pc-item"><a class="pc-link" href="<?= base_url('/produk/produk-gallery') ?>">Gallery View</a></li>
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/users') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-user"></i></span><span
                        class="pc-mtext">Master Users</span></a>
                </li>
                <!-- Dashboard End -->

                <!-- Transaksi -->
                <li class="pc-item pc-caption">
                    <label>Transaksi</label>
                    <i class="ti ti-report-money"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/transaksi') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-report-money"></i></span><span
                        class="pc-mtext">Transaksi</span></a>
                </li>
                <!-- Transaksi End -->

                <!-- Bahan Baku -->
                <li class="pc-item pc-caption">
                    <label>Bahan Baku</label>
                    <i class="ti ti-meat"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-sausage"></i></span><span
                        class="pc-mtext">Pengadaan Harian</span><span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="<?= base_url('/bahan-baku-masuk') ?>">Masuk</a></li>
                        <li class="pc-item"><a class="pc-link" href="<?= base_url('/bahan-baku-keluar') ?>">Keluar</a></li>
                    </ul>
                </li>
                <!-- Bahan Baku End -->

                <!-- Inventory -->
                <li class="pc-item pc-caption">
                    <label>Inventory</label>
                    <i class="ti ti-building-warehouse"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/bahan-penunjang') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-building-warehouse"></i></span><span
                        class="pc-mtext">Bahan Penunjang</span></a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/alat-produksi') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-tools-kitchen"></i></span><span
                        class="pc-mtext">Alat Produksi</span></a>
                </li>
                <!-- Inventory End -->

                <!-- SDM -->
                <li class="pc-item pc-caption">
                    <label>SDM</label>
                    <i class="ti ti-users"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/employees') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-users"></i></span><span
                        class="pc-mtext">Data Karyawan</span></a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/gaji') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-wallet"></i></span><span
                        class="pc-mtext">Perhitungan Gaji</span></a>
                </li>
                <!-- SDM End -->

                <!-- Maintenance -->
                <li class="pc-item pc-caption">
                    <label>Maintenance</label>
                    <i class="ti ti-settings"></i>
                </li>
                <li class="pc-item">
                    <a href="../dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-settings"></i></span><span
                        class="pc-mtext">Pemeliharaan</span></a>
                </li>
                <li class="pc-item">
                    <a href="../dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-wand"></i></span><span
                        class="pc-mtext">Upgrade</span></a>
                </li>
                <!-- Maintenance End -->

                <!-- Users -->
                <li class="pc-item pc-caption">
                    <label>Logout</label>
                    <i class="ti ti-settings"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('/login') ?>" class="pc-link"><span class="pc-micon"><i class="ti ti-logout"></i></span><span
                        class="pc-mtext">Logout</span></a>
                </li>
                <!-- Users End -->
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->