<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>
        <?= $title['title'] ?>
    </title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is made using Bootstrap 5 design framework. Download the free admin template & use it for your project." />
    <meta name="keywords"
        content="Berry, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template" />
    <meta name="author" content="CodedThemes" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="assets/images/logo_ayam_nangkring.jpg" type="image/x-icon" />
    <!-- [Google Font] Family -->
    <link rel="stylesheet" href="<?= base_url('assets/css/css2.css') ?>">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="<?= base_url('assets/fonts/tabler-icons.min.css') ?>" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css') ?>" />
    <!-- Add these links to your HTML -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap_an.min.css') ?>">
    <!-- <script src="<?= base_url('assets/js/jquery-3.5.1.slim.min.js') ?>"></script> -->
    <script src="<?= base_url('assets/js/jquery-3.6.4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>   
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" id="main-style-link" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style-preset.css') ?>" id="preset-style-link" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap5.min.css') ?>">
    <script src="<?= base_url('assets/js/jquery-3.7.0.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.min.css') ?>">
    <style>
        .opacity {
            opacity: 0.7;
            /* Nilai antara 0 (sepenuhnya transparan) dan 1 (tidak transparan) */
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .arrow-button {
            background-color: #343EFA;
            /* Set the background color */
            border: none;
            border-radius: 50%;
            /* Make it circular */
            padding: 5px;
            /* Add some padding for spacing */
            cursor: pointer;
        }

        .arrow-button i {
            color: #fff;
            /* Set the color of the arrow icon */
        }

        #jumlah {
            margin: 0 10px;
        }
    </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <?= $this->include('partials/header'); ?>
    <?= $this->include('partials/sidebar'); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('partials/footer'); ?>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="<?= base_url('assets/js/plugins/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/config.js') ?>"></script>
    <script src="<?= base_url('assets/js/pcoded.js') ?>"></script>
    <script src="<?= base_url('assets/js/layoutTheme.js') ?>"></script>
    <!-- [Page Specific JS] start -->
    <!-- Apex Chart -->
    <script src="<?= base_url('assets/js/plugins/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/pages/dashboard-default.js') ?>"></script>
    <script src="<?= base_url('assets/js/tableToExcel.js') ?>"></script>
    <!-- [Page Specific JS] end -->

    <style>
        /* Menentukan gaya untuk kelas .payment-btn */
        /* .payment-btn { */
        /* background-color: #808080; Initial gray background color */
        /* color: #ffffff; Text color */
        /* Tambahkan gaya tambahan sesuai kebutuhan */
        /* } */

        /* Menentukan gaya untuk kelas .payment-btn saat dipilih */
        .payment-btn.btn-selected {
            background-color: #535353;
            /* Darker gray background color when selected */
            color: #ffffff;
            /* Text color when selected */
            /* Tambahkan gaya tambahan sesuai kebutuhan */
        }

        .payment-btn.btn-selected-1 {
            background-color: #535353;
            /* Darker gray background color when selected */
            color: #ffffff;
            /* Text color when selected */
            /* Tambahkan gaya tambahan sesuai kebutuhan */
        }

        .badge-container {
            width: 70px;
            /* Set the desired width */
            overflow: hidden;
        }
    </style>
</body>
<!-- [Body] end -->

</html>