<?= $this->extend('layout/auth-layout'); ?>

<?= $this->section('auth'); ?>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <a href="#" class="d-flex justify-content-center">
                            <img src="<?= base_url('assets/images/logo_ayam_nangkring.jpg') ?>" alt="Foto Barang"
                                width="100">
                        </a>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="auth-header">
                                    <h2 class="text-secondary mt-5"><b>Hi, Welcome Back</b></h2>
                                    <p class="f-16 mt-2">Login in to your account</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="my-4 d-flex justify-content-center">Sign in with Username & Password</h5>
                        <form action="<?= site_url('auth-processLogin'); ?>" method="POST">
                            <div class="form-floating mb-3">
                                <input type="username" class="form-control" id="floatingInput"
                                    placeholder="Email address / Username" name="username" required />
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" placeholder="Password"
                                    name="password" required />
                                <label for="floatingInput">Password</label>
                            </div>
                            <div class="d-grid mt-4">
                                <!-- <a href="<?= base_url('/dashboard') ?>" class="btn btn-secondary">Sign In</a> -->
                                <button type="submit" class="btn btn-secondary">Sign In</button>
                            </div>
                        </form>
                        <hr />
                        <h5 class="d-flex justify-content-center text-light">Don't have an account?</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        $(function () {

            <?php if (session()->has("error")) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?= session("error") ?>'
                })
            <?php } ?>
        });
    </script>

    <?= $this->endSection(); ?>