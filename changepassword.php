<?php
include('dbconnection.php');

if (!isset($_SESSION['myid'])) {
    header("Location: old_index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - juniors (A JARS Project)</title>
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
                        <img src="<?php $userid = $_SESSION['myid'];
                                    $query = $conn->query(" SELECT * FROM `userinfo` WHERE `user_id`=$userid");
                                    $row = $query->fetch_assoc();
                                    echo $row['image']; ?>" class="brand_logo" alt="Logo" id="image_display">
                    </div>
                </div>
                <!--Form-->
                <?php
                $sql = $conn->query("SELECT * FROM `users` WHERE `id` = $userid");
                $row = $sql->fetch_assoc();

                if (isset($_POST['changePassword'])) {
                    $currentPassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['currentPassword']));
                    $newPassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['newPassword']));
                    $confirmNewPassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['confirmNewPassword']));
                    if ($row['password'] == $currentPassword) {
                        if ($newPassword == $confirmNewPassword) {
                            $conn->query("UPDATE users SET password = '" . $newPassword . "'  WHERE `id` = '" . $_SESSION['myid'] . "'");
                            echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Password Successfully Changed!',
                                    text: 'Redirecting to Settings...',
                                    }).then(function() {
                                    window.location = \"settings.php\";
                                    }); 
                                    </script>";
                        } else {
                            echo "<script> Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Password Mismatched!',
                                    }); 
                                    </script>";
                        }
                    } else {
                        echo "<script> Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Inputted Password Does Not Match Current Password!',
                                }); 
                                </script>";
                    }
                }

                ?>
                <div class="d-flex justify-content-center form_container_2">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <h3>Change Password</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="currentPassword" class="form-control input_text" placeholder="Current Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-unlock"></i></i></span>
                            </div>
                            <input type="password" name="newPassword" class="form-control input_text" placeholder="New Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" name="confirmNewPassword" class="form-control input_text" placeholder="Re-enter New Password" required>
                        </div>
                        <div class="d-flex justify-content-center login_container">
                            <div class="btn-align">
                                <button type="submit" name="changePassword" class="btn login_btn">Change Password</button> <br>
                                <a class="back-button" href="settings.php">Back</a>       
                            </div>                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>