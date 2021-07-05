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
    <title>About - juniors (A JARS Project)</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">Settings</a>
                        </li>
                        <li class="nav-item  active">
                            <p class="active-button">About</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Main body -->
    <div class="aboutBody">
        <div class="team-section">
            <div class="inner-width">
                <h1>Meet Our Team</h1>
                <div class="pers">
                    <div class="pe">
                        <img src="assets/images/Ricky2.png" alt="">
                        <div class="p-name">Ricky Martin Roman</div>
                        <div class="p-des">Back-end Developer</div>
                        <div class="p-sm">
                            <a href="https://www.facebook.com/rckyrmn"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/rckyrmnx"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/rckyrmnx/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="pe">
                        <img src="assets/images/Julie.jfif" alt="">
                        <div class="p-name">Julie Jamolo</div>
                        <div class="p-des">Front-end Developer</div>
                        <div class="p-sm">
                            <a href="https://www.facebook.com/juliejamolo/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/itsjuliebird"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/itsjuliebird/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="pe">
                        <img src="assets/images/Robert.png" alt="">
                        <div class="p-name">Robert Lloyd Aban</div>
                        <div class="p-des">Debugger</div>
                        <div class="p-sm">
                            <a href="https://www.facebook.com/robertkraust"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/robertowzzz"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/robertowzzz/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="pe">
                        <img src="assets/images/Dainielle.png" alt="">
                        <div class="p-name">Dainielle Sarmiento</div>
                        <div class="p-des">Researcher</div>
                        <div class="p-sm">
                            <a href="https://www.facebook.com/daniloveschicken"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/dainiii_"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/_dainiii/"><i class="fab fa-instagram"></i></a>
                        </div>
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