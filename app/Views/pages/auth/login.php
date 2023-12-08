<?= $this->extend('layout/auth-layout'); ?>

<?= $this->section('auth');?>

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
                                <img src="../assets/images/logo-dark.svg" />
                            </a>
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <div class="auth-header">
                                            <h2 class="text-secondary mt-5"><b>Hi, Welcome Back</b></h2>
                                            <p class="f-16 mt-2">Enter your credentials to continue</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                                        <img src="../assets/images/authentication/google-icon.svg" />Sign In With Google
                                    </button>
                                </div>
                                <div class="saprator mt-3">
                                    <span>or</span>
                                </div>
                                <h5 class="my-4 d-flex justify-content-center">Sign in with Email address</h5>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="Email address / Username" />
                                    <label for="floatingInput">Email address / Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="Password" />
                                    <label for="floatingInput">Password</label>
                                </div>
                                <div class="d-flex mt-1 justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                                        <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                                    </div>
                                    <a href="<?= base_url('/forgot-password') ?>">
                                        <h5 class="text-secondary">Forgot Password?</h5>
                                    </a>
                                </div>
                                <div class="d-grid mt-4">
                                    <a href="<?= base_url('/dashboard') ?>" class="btn btn-secondary">Sign In</a>
                                    <!-- <button type="button" class="btn btn-secondary">Sign In</button> -->
                                </div>
                                <hr />
                                <h5 class="d-flex justify-content-center">Don't have an account?</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?= $this->endSection(); ?>