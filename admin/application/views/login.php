<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login MonzFlower</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/icons/logo.jpg" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mainn.css">
    <style>
        body {
            background-image: url("<?= base_url() ?>assets/images/tentang.jpg");
            background-color: #cccccc;
            height: 1000px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="<?= site_url('auth/process') ?>" method="post" class="login100-form validate-form">
                    <span class="login100-form-title p-b-26">
                        Login MonzFlower
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"> D M I N</i>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Isi Username">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" name="login" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Back to Home klick
                        </span>

                        <a class="txt2" href="../../index.html">
                            Here
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>