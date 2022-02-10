<?php
// Cek apakah terdapat session nama message
if ($this->session->flashdata('message')) { // Jika ada
    echo '<div class="alert alert-danger">' . $this->session->flashdata('message') . '</div>'; // Tampilkan pesannya
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Kasir Acien</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/acien.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url() ?>assets/NewBiz/img/acien2.png" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="post" action="<?php echo base_url('Login/login'); ?>">
                    <div class="d-flex align-items-center">
                        <a href="<?= base_url('dashboard'); ?>" class="d-flex align-items-center">
                            <svg style="margin-top:-100px; width: 25px;height:20px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                            </svg><b style="margin-top:-100px;" class="pl-2">Home</b>
                        </a>
                    </div>
                    <span class="login100-form-title">
                        <?= $anjing ?>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Inputkan username yang benar">
                        <input class="input100" type="text" name="username" placeholder="Username" value='<?= $this->session->userdata('registered_username') ?>'>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Member Baru?
                        </span>
                        <a class="txt2" href="<?= base_url('register'); ?>">
                            Buat Akun Baru
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/Login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/Login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/Login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/Login/js/main.js"></script>

</body>

</html>