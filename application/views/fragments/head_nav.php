    <!-- Navbar -->
    <nav class="navbar navbar-title">
        <span class="navbar-text">beta jr.</span>
    </nav>
    <div class="navbar-main sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="<?= base_url("home") ?>" id="#navbar-brand-container">
                    <img src="<?= base_url() ?>assets/images/BJ-ICON-rev.png" alt="logo" id="logo">
                    <a class="navbar-brand" href="homepage.php">beta jr.</a>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item <?= $this->uri->segment(2) == null ? 'active' : '' ?>">
                            <!-- <p class="active-button">Home</p> -->
                            <a class="<?= $this->uri->segment(2) == null ? 'active-button' : 'nav-link' ?>" href="<?= base_url(); ?>home">Home</a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'collection' ? 'active' : '' ?>">
                            <a class="<?= $this->uri->segment(2) == 'collection' ? 'active-button' : 'nav-link' ?>" href="<?= base_url(); ?>collection/get_collection">My Collection</a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'settings' ? 'active' : '' ?>">
                            <a class="<?= $this->uri->segment(2) == 'settings' ? 'active-button' : 'nav-link' ?>" href="<?= base_url(); ?>home/settings">Settings</a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'about' ? 'active' : '' ?>">
                            <a class="<?= $this->uri->segment(2) == 'about' ? 'active-button' : 'nav-link' ?>" href="<?= base_url(); ?>home/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>home/logout">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>