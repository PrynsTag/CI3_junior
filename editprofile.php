<?php
include('dbconnection.php');

if (!isset($_SESSION['myid'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - juniors (A JARS Project)</title>
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
                        <img src="<?php $id = $_SESSION['myid'];
                                    $query = $conn->query(" SELECT * FROM `userinfo` WHERE `user_id`=$id");
                                    $row = $query->fetch_assoc();
                                    echo $row['image']; ?>" class="brand_logo" alt="Logo" id="image_display">
                    </div>
                </div>
                <!--Form-->
                <?php
                if (isset($_POST['submit'])) {
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $bio = $_POST['bio'];

                    $errors = array();
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_type = $_FILES['image']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

                    $extensions = array("jpeg", "jpg", "png");

                    if (in_array($file_ext, $extensions) === false) {
                        $errors[] = "Invalid Extension (PNG, JPEG & JPG Only)";
                    }

                    if ($file_size > 2097152) {
                        $errors[] = "File too large! (Max. 2Mb)";
                    }

                    if (empty($errors) == true) {
                        move_uploaded_file($file_tmp, "./uploads/user_profile/" . $file_name);
                        $link = "./uploads/user_profile/" . $file_name;
                        $sql = "UPDATE userinfo SET firstname = '" . $firstname . "', lastname = '" . $lastname . "', bio = '" . $bio . "', image = '" . $link . "' WHERE `user_id` = '" . $id . "'";
                        $result = $conn->query($sql);
                        echo "<script> Swal.fire({
                            icon: 'success',
                            title: 'Welcome to juniors!',
                            text: 'Redirecting to Home Page...',
                            }).then(function() {
                            window.location = \"settings.php\";
                            }); 
                            </script>";
                    } else {
                        echo "<script> Swal.fire({
							icon: 'error',
							title: 'Error',
							text: '";
                        foreach ($errors as $value) {
                            echo $value;
                        }
                        echo "',}) </script>";
                    }
                }
                ?>
                <div class="d-flex justify-content-center form_container_2">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-user"></i></span>
                            </div>
                            <input type="text" name="firstname" class="form-control input_text" placeholder="<?php echo $row['firstname']; ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                            </div>
                            <input type="text" name="lastname" class="form-control input_text" placeholder="<?php echo $row['lastname']; ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                            </div>
                            <textarea name="bio" class="form-control input_text input_textarea" placeholder="<?php echo $row['bio']; ?>" rows="3" required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                            </div>
                            <input type="file" name="image" class="form-control input_text" id="imgInp" required> <br>
                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            $('#image_display').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                                    }
                                }

                                $("#imgInp").change(function() {
                                    readURL(this);
                                });
                            </script>
                        </div>
                        <div class="d-flex justify-content-center login_container">
                            <div class="btn-align"> 
                            <button type="submit" name="submit" class="btn login_btn">Submit</button>
                            <a class="back-button" href="settings.php">Back</a> <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>