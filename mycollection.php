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
    <title>My Collection - juniors (A JARS Project)</title>
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
                        <li class="nav-item active">
                            <p class="active-button">My Collection</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">Settings</a>
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
    <div class="container-fluid" id="cardContainer">
        <div class="headingContainer">
            <h1>My Collection</h1>
        </div>
        <div class="bodyContainer">
            <div class="contentContainer">
                <ul class="nav justify-content-end collectionCard additemnavbar">
                    <li class="nav-item">
                        <a class="nav-link" href="additem.php">Add Post</a>
                    </li>
                </ul>
                <div class="row row-cols-1 row-cols-md-3 g-4 collectionCard">
                    <?php
                    $id = $_SESSION['myid'];
                    $result = $conn->query("SELECT * FROM `posts` where `user_id` = '" . $id . "'");
                    $rowcount = $result->num_rows;
                    if ($rowcount >= 1) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class=\"col col-remove-margin\">";
                            echo "<div class=\"card\">";
                            echo '<div style="background: url(\'' . $row['photo'] . '\') center no-repeat; background-size: 100% 100%;" class="boxImageContainer">';
                            echo "</div>";
                            echo "<div class=\"card-body colcard-body d-flex align-items-center\">";
                            echo "<div>";
                            echo "<div class=\"center-card\">";
                            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                            echo '<p class="card-text">' . $row['description'] . '</p>';
                            echo "</div>";
                            echo "<div class=\"button-1\">";
                            echo '<a href="deleteitem.php?postid=' . $row['post_id'] . '">Delete Item</a>';
                            echo "</div>";
                            echo "<div class=\"button-2\">";
                            echo '<a href="edititem.php?postid=' . $row['post_id'] . '">Edit Item</a>';
                            echo "</div>";
                            echo "</div></div></div></div>";
                        }
                    } else {
                        echo "<div class=\"noitems\">
                        <p id=\"head\">No Posts Yet!</p>
                        <p id=\"sub\">You can start by pressing the 'Add Post' button :)</p>
                        </div>";
                    }
                    ?>
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