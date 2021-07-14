<div id="footer">
    <div class="row ft-main">
        <div class="col-md ft-content">
            <div class="container-ft">
                <img class="logo-ft" src="assets/images/JARS-ICON.png" alt="logo">
            </div>
        </div>
        <div class="col-md ft-content">
            <div class="container-ft menu-ft">
                <h1>Links</h1>
                <ul>
                    <li><a href="mycollection.php">My Collection</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md ft-content">
            <div class="container-ft menu-ft">
                <h1>Follow us</h1>
                <ul>
                    <li><a href="https://www.facebook.com/juliejamolo">Facebook</a></li>
                    <li><a href="https://www.instagram.com/rckyrmnx">Instagram</a></li>
                    <li><a href="https://www.twitter.com/_dainiii">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="hr-ft">
    <div class="allrights">
        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021 JARS. All Rights Reserved.</p>
    </div>
</div>

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