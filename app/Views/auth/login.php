<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign In | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?> " />
</head>

<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->


    <!-- ======== sidebar-nav end =========== -->


    <!-- ========== header start ========== -->

    <!-- ========== header end ========== -->

    <!-- ========== signin-section start ========== -->
    <section class="signin-section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->

            <!-- ========== title-wrapper end ========== -->

            <div class="row g-0 auth-row">
                <div class="col-md-6 col-lg-6">
                    <div class="auth-cover-wrapper bg-primary-100">
                        <div class="auth-cover">
                            <div class="title text-center">
                                <h1 class="text-primary mb-10">Welcome Back</h1>
                                <p class="text-medium">
                                    Sign in to your Existing account to continue
                                </p>
                            </div>
                            <div class="cover-image">
                                <img src="<?= base_url('assets/images/auth/signin-image.svg') ?>" alt="" />
                            </div>
                            <div class="shape-image">
                                <img src="<?= base_url('assets/images/auth/shape.svg') ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6 col-lg-6 d-flex justify-content-center align-content-center">
                    <div class="signin-wrapper">
                        <div class="form-wrapper">
                            <h6 class="mb-15">Sign In Form</h6>
                            <p class="text-sm mb-25">
                                Start creating the best possible user experience for you
                                customers.
                            </p>
                            <div class="text-danger text-center">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                            <form method="post" action="<?= base_url('login') ?>">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Username</label>
                                            <input
                                                class="<?= ($validation->hasError('username')) ? 'is-invalid' : '' ?> form-control"
                                                type="text" name="username" placeholder="Username" />
                                            <div class="text-danger">
                                                <?= $validation->getError('username') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Password</label>
                                            <input
                                                class="<?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> form-control"
                                                type="password" name="password" placeholder="Password" />
                                            <div class="text-danger">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button type="submit"
                                                class="main-btn primary-btn btn-hover w-100 text-center">
                                                Sign In
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- ========== signin-section end ========== -->




    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>

</html>