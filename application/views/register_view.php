<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - juniors (A JARS Project)</title>

    <!--Icon-->
    <?= link_tag("/assets/image/JARS-ICON-rev.png", "icon", "image/x-icon") ?>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--CSS & Font-->
    <?= link_tag("assets/css/custom.css", "stylesheet") ?>

    <!--Scripts-->
    <script type="text/javascript" src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/df94d8b582.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light logo-change">
        <div class="container-fluid">
            <p>JARS</p>
        </div>
    </nav>
    <div id="registerContainer">
        <div class="d-flex justify-content-center h-100">
            <div class="logo_card">
                <!--Logo-->
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="<?= base_url() ?>/assets/images/JARS-ICON-rev.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <!--Form-->
                <div class="d-flex justify-content-center form_container_2">
                    <form action="<?= base_url() ?>register/validation" method="POST">
                        <?php
                        if ($this->session->tempdata("message")) {
                            echo '<div class="alert alert-success">' . $this->session->tempdata("message") . '</div>';
                        }
                        ?>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="emailadd" class="form-control input_text" placeholder="Email Address">
                            <small class="text-danger w-100"><?= form_error("emailadd") ?></small>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_text" placeholder="Username">
                            <small class="text-danger w-100"><?= form_error("username") ?></small>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_text" placeholder="Password">
                            <small class="text-danger w-100"><?= form_error("password") ?></small>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="cpassword" class="form-control input_text" placeholder="Confirm Password">
                            <small class="text-danger w-100"><?= form_error("cpassword") ?></small>
                        </div>
                        <div class="d-flex justify-content-center login_container">
                            <button type="submit" name="submitRegister" class="btn login_btn">Register</button>
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-end links">
                                <a href="<?= base_url() ?>login" class="signup">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>