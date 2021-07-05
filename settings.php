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
    <title>Home - juniors (A JARS Project)</title>
    <!--Icon-->
    <link rel="icon" href="./assets/images/JARS-ICON-rev.png" type="image/x-icon">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Anton&family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <!--CSS & Font-->
    <link rel="stylesheet" href="./assets/css/custom.css">
    <!--Scripts-->
    <script type="text/javascript" src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/df94d8b582.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-title">
        <span class="navbar-text">juniors.</span>
    </nav>
    <div class="navbar-main sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="homepage.php" id="#navbar-brand-container">
                    <img src="assets/images/JARS-ICON.png" alt="logo" id="logo">
                    <a class="navbar-brand" href="homepage.php">juniors.</a>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mycollection.php">My Collection</a>
                        </li>
                        <li class="nav-item active">
                            <p class="active-button" href="settings.php">Settings</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--Body-->
    <?php
    $userid = $_SESSION['myid'];
    $sql = $conn->query("SELECT * FROM `userinfo` WHERE `user_id` = $userid");
    $row = $sql->fetch_assoc();

    $sql2 = $conn->query("SELECT * FROM `users` WHERE `id` = $userid");
    $row2 = $sql2->fetch_assoc();
    ?>
    <div class="settingsBody">
    <div class="settingsCard">
        <div class="settingsImage">
            <img src="<?php echo $row['image']; ?>" alt="" srcset="">
            <img src="<?php echo $row['image']; ?>" alt="" srcset="">
        </div>
            <div class="settingsDetails">
                <div class="settingsContent">
                    <h2> <?php echo $row['firstname']; ?> <?php echo " " ?> <?php echo $row['lastname']; ?>
                    <p>
                        <span> <b>Email Address:</b> <?php echo $row2['emailadd']; ?> </span> 
                        <br><span> <b><?php echo "Bio: "?></b> <?php echo $row['bio']; ?> </span> 
                    </p>
                    </h2>
                        <div class="settingButtons">
                            <a class href="editprofile.php">Edit Profile</a>
                            <a class href="changepassword.php">Change Password</a>
                        </div>     
                </div>
            </div>
    </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Optional JavaScript -->
    <script>
        var topofDiv = $(".navbar-title").offset().top;
        var height = $(".navbar-title").outerHeight();

        $(window).scroll(function() {
            if ($(window).scrollTop() > (topofDiv + height)) {
                $("#logo").hide();
                $(".navbar-brand").fadeIn(500);
            } else {
                $(".navbar-brand").hide();
                $("#logo").fadeIn(500);
            }
        });
        var oldSrc = 'assets/images/JARS-ICON-rev.png';
        var newSrc = 'assets/images/JARS-ICON.png';
        $("#logo").hover(function() {
            $(this).attr('src', newSrc)
        });
        $("#logo").mouseleave(function() {
            $(this).attr('src', oldSrc)
        });
    </script>

</body>

</html>