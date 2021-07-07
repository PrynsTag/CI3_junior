<?php
    include('dbconnection.php');
    if (isset($_SESSION['myid'])) {
        header("Location: homepage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - juniors (A JARS Project)</title>
    <!--Icon-->
    <link rel="icon" href="./assets/images/JARS-ICON-rev.png" type="image/x-icon">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--CSS & Font-->
    <link rel="stylesheet" href="./assets/css/custom.css">
    <!--Scripts-->
    <script type="text/javascript" src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/df94d8b582.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php
    if (isset($_POST['submitLogin'])) {
        $user_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

        $result = $conn->query("SELECT * FROM `users` WHERE `username` = '" . $user_name . "' AND `password` = '" . $password . "'");
        $row = $result->num_rows;

        if ($row == 1) {
            $data = $result->fetch_assoc();
            $_SESSION['myid'] = $data['id'];
            session_regenerate_id();
            header("Location: homepage.php");
        } else {
            echo
            "<script> Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Your username or password may be incorrect!',
            }) </script>";
        }
    }
    require 'mail.php';
    ?>
    <nav class="navbar logo-change navbar-light bg-light" style="padding:0;">
        <div class="container-fluid">
            <p>JARS</p>
        </div>
    </nav>
    <div id="loginContainer">
        <div class="d-flex justify-content-center h-100">
            <div class="logo_card">
                <!--Logo-->
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="./assets/images/JARS-ICON-rev.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="login_heading">
                        <h1>Sign in</h1>
                    </div>
                </div>
                <!--Form-->
                <div class="d-flex justify-content-center form_container">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_user textbox-text" placeholder="Username" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass textbox-text" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-center login_container">
                            <button type="submit" name="submitLogin" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>
                <!--Register Link-->
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        <span class="regprompt">Don't have an account? &nbsp;</span> <a href="./register.php" class="signup">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>