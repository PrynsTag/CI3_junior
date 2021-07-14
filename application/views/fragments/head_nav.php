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
                            <!-- <p class="active-button">Home</p> -->
                            <a class="active-button" href="<?= base_url(); ?>home/collection">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>home/collection">My Collection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>home/settings">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>home/collection">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>home/logout">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>