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
                    <li class="nav-item active">
                        <p class="active-button">Home</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mycollection.php">My Collection</a>
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
        <h1>Featured</h1>
    </div>
    <div class="bodyContainer">
        <div class="contentContainer">
            <div class="row row-cols-1 row-cols-md-3 g-4 collectionCard">
                <?php
                $id = $_SESSION['myid'];
                $result = $conn->query("SELECT * FROM `posts` order by RAND()");
                $rowcount = $result->num_rows;
                if ($rowcount >= 1) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class=\"col col-remove-margin\">";
                        echo "<div class=\"card\">";
                        //echo "<div class=\"boxImageContainer\">";
                        echo '<div style="background: url(\'' . $row['photo'] . '\') center no-repeat; background-size: 100% 100%;" class="boxImageContainer">';
                        // echo '<img src="' . $row['photo'] . '" class="card-img-top boxImage">';
                        echo "</div>";
                        echo "<div class=\"card-body colcard-body d-flex align-items-center\">";
                        echo "<div>";
                        echo "<div class=\"center-card\">";
                        echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                        echo '<p class="card-text">' . $row['description'] . '</p>';
                        echo "</div>";
                        echo "</div></div></div></div>";
                        $counter += 1;
                        if ($counter == 9) {
                            break;
                        }
                    }
                } else {
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