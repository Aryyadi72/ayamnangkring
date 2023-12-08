<!DOCTYPE html>
<html lang="en">
    <!-- [Head] start -->
    <head>
        <title><?= $title ?></title>
        <!-- [Meta] -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
        name="description"
        content="Berry is made using Bootstrap 5 design framework. Download the free admin template & use it for your project."
        />
        <meta name="keywords" content="Berry, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template" />
        <meta name="author" content="CodedThemes" />

        <!-- [Favicon] icon -->
        <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon" />
        <!-- [Google Font] Family -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link" />
        <!-- [Tabler Icons] https://tablericons.com -->
        <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" />
        <!-- [Material Icons] https://fonts.google.com/icons -->
        <link rel="stylesheet" href="../assets/fonts/material.css" />
        <!-- [Template CSS Files] -->
        <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" />
        <link rel="stylesheet" href="../assets/css/style-preset.css" id="preset-style-link" />

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

        <?= $this->renderSection('auth'); ?>
        <!-- [ Main Content ] end -->
        <!-- Required Js -->
        <script src="../assets/js/plugins/popper.min.js"></script>
        <script src="../assets/js/plugins/simplebar.min.js"></script>
        <script src="../assets/js/plugins/bootstrap.min.js"></script>
        <script src="../assets/js/config.js"></script>
        <script src="../assets/js/pcoded.js"></script>
        <script src="../assets/js/layoutTheme.js"></script>

    </body>
    <!-- [Body] end -->
</html>
