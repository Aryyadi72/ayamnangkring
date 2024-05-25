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
                <div class="card mt-5">
                    <div class="card-body">
                        <a href="#" class="d-flex justify-content-center mt-3">
                            <img src="../assets/images/logo-dark.svg" />
                        </a>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="auth-header">
                                    <h2 class="text-secondary mt-5"><b>Sign up</b></h2>
                                    <p class="f-16 mt-2">Enter your credentials to continue</p>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted" style="width: 100%">
                            <img src="../assets/images/authentication/google-icon.svg" />Sign Up With Google
                        </button>
                        <div class="saprator mt-3">
                            <span>or</span>
                        </div>
                        <h5 class="my-4 d-flex justify-content-center">Sign Up with Email address</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="First Name" />
                                    <label for="floatingInput">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="Last Name" />
                                    <label for="floatingInput">Last Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Email Address / Username" />
                            <label for="floatingInput">Email Address / Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Password" />
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-check mt-3s">
                            <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                            <label class="form-check-label" for="customCheckc1">
                            <h5>Agree with <span>Terms & Condition.</span></h5>
                            </label>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="button" class="btn btn-secondary p-2">Sign Up</button>
                        </div>
                        <hr />
                        <a href="<?= base_url('/login') ?>">
                            <h5 class="d-flex justify-content-center">Already have an account?</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>