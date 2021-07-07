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
    <title>Register - juniors (A JARS Project)</title>
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

    if (isset($_GET['emailExists'])) {
        echo "<script> Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Email Address is already in use!',
      }) </script>";
    }

    if (isset($_GET['userExists'])) {
        echo "<script> Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Username is already taken!',
      }) </script>";
    }

    if (isset($_GET['successRegister'])) {
        echo "<script> Swal.fire({
        icon: 'success',
        title: 'Registered Successfully!',
        text: 'Redirecting to Login Page...',
        }).then(function() {
        window.location = \"old_index.php\";
        }); 
        </script>";
    }

    if (isset($_GET['errorNotSame'])) {
        echo "<script> Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Passwords Mismatched!',
      }) </script>";
    }

    require 'mail.php';

    if (isset($_POST['submitRegister'])) {
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['emailadd']));
        $user_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
        $confirmpassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cpassword']));

        $result = $conn->query("SELECT * FROM `users` WHERE `emailadd` = '" . $email . "'");
        $row = $result->num_rows;

        $result2 = $conn->query("SELECT * FROM `users` WHERE `username` = '" . $user_name . "'");
        $row2 = $result2->num_rows;

        if ($row == 1) {
            //Email Exists
            header("Location: ?emailExists");
        } elseif ($row2 == 1) {
            //Username Exists
            header("Location: ?userExists");
        } else {
            if ($password == $confirmpassword) {
                $rand = mt_rand(100000, 999999);
                $rand2 = $rand;
                $mail->SetFrom($gmailUsername, "Account Verification Code");
                $mail->Subject = "Please verify your account!";
                $mail->Body = "Your verification code is: " . $rand2;
                $mail->AddAddress($email);
                if (!$mail->Send()) {
                    echo "<script> Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '.$mail->ErrorInfo.',
                    }) </script>";
                } else {
                    $statement = $conn->prepare("INSERT INTO `users` (username,password,emailadd,`code`) VALUES (?,?,?,?)");
                    $statement->bind_param("sssi", $user_name, $password, $email, $rand2);
                    $statement->execute();
                    //Success Register
                    header("Location: ?successRegister");
                }
            } else {
                //Password Mismatch
                header("Location: ?errorNotSame");
            }
        }
    }

    ?>
    <nav class="navbar navbar-light bg-light logo-change" style="padding:0;">
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
                        <img src="./assets/images/JARS-ICON-rev.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <!--Form-->
                <div class="d-flex justify-content-center form_container_2">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="emailadd" class="form-control input_text" placeholder="Email Address" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_text" placeholder="Username" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_text" placeholder="Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="cpassword" class="form-control input_text" placeholder="Confirm Password" required>
                        </div>
                        <div class="d-flex justify-content-center login_container">
                            <button type="submit" name="submitRegister" class="btn login_btn">Register</button>
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-end links">
                                <a href="old_index.php" class="signup">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>