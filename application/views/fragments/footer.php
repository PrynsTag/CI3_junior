<div id="footer">
    <div class="row ft-main">
        <div class="col-md ft-content">
            <div class="container-ft">
                <img class="logo-ft" src="<?= base_url(); ?>assets/images/BJ-ICON-rev.png" alt="logo">
            </div>
        </div>
        <div class="col-md ft-content">
            <div class="container-ft menu-ft">
                <h1>Links</h1>
                <ul>
                    <li><a href="<?= base_url('home'); ?>">Home</a></li>
                    <li><a href="<?= base_url('home/collection'); ?>">My Collection</a></li>
                    <li><a href="<?= base_url('home/settings'); ?>">Settings</a></li>
                    <li><a href="<?= base_url('home/about'); ?>">About</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md ft-content">
            <div class="container-ft menu-ft">
                <h1>Follow us</h1>
                <ul>
                    <li><a href="https://www.facebook.com/prynstag">Facebook</a></li>
                    <li><a href="https://www.instagram.com/rckyrmnx">Instagram</a></li>
                    <li><a href="https://www.twitter.com/itsjuliebird">Twitter</a></li>
                    <li><a href="https://github.com/CWGGa">Github</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="hr-ft">
    <div class="allrights">
        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021 Beta jr. All Rights Reserved.</p>
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
    var oldSrc = '<?= base_url('assets/images/BJ-ICON-rev.png'); ?>';
    var newSrc = '<?= base_url('assets/images/BJ-ICON.png'); ?>';
    $("#logo").hover(function() {
        $(this).attr('src', newSrc)
    });
    $("#logo").mouseleave(function() {
        $(this).attr('src', oldSrc)
    });
</script>