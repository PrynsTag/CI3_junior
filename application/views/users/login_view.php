<?php if ($this->session->tempdata('error')) : ?>
    <div class="alert alert-danger">
        <p><?= $this->session->tempdata('error') ?></p>
    </div>
<?php endif; ?>

<?php if ($this->session->tempdata('success')) : ?>
    <div class="alert alert-success">
        <p><?= $this->session->tempdata('success') ?></p>
    </div>
<?php endif ?>

<nav class="navbar logo-change navbar-light bg-light" style="padding:0;">
    <div class="container-fluid">
        <p><?= $group_name; ?></p>
    </div>
</nav>
<div id="loginContainer">
    <div class="d-flex justify-content-center h-100">
        <div class="logo_card">
            <!--Logo-->
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container_login">
                    <img src="<?= $form_logo ?>" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="login_heading">
                    <h1 class="text-center">Sign in</h1>
                    <?php
                    if ($this->session->tempdata("message")) {
                        echo '<div class="alert alert-success">' . $this->session->tempdata("message") . '</div>';
                    }
                    ?>
                </div>
            </div>
            <!--Form-->
            <div class="d-flex justify-content-center form_container">
                <?php echo form_open('users/login', $form_attributes); ?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <?php echo form_input($input_username); ?>
                    <small class="text-danger w-100"><?= form_error("username") ?></small>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <?php echo form_input($input_password); ?>
                    <small class="text-danger w-100"><?= form_error("password") ?></small>
                </div>
                <div class="d-flex justify-content-center login_container">
                    <?php echo form_input($input_submit); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!--Register Link-->
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    <p class="regprompt">Don't have an account?&nbsp;<a class="signup" href="<?= base_url() ?>Register">Sign up</a></p>&nbsp;
                </div>
            </div>
        </div>
    </div>
</div>