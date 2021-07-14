<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">
        <p><?= $this->session->flashdata('error') ?></p>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <p><?= $this->session->flashdata('success') ?></p>
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
                <div class="brand_logo_container">
                    <img src="<?= $form_logo ?>" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="login_heading">
                    <h1>Sign in</h1>
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
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <?php echo form_input($input_password); ?>
                </div>
                <div class="d-flex justify-content-center login_container">
                    <?php echo form_input($input_submit); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!--Register Link-->
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    <p class="regprompt">Don't have an account?&nbsp;<a class="signup" href="<?= base_url() ?>register">Sign up</a></p>&nbsp;
                </div>
            </div>
        </div>
    </div>
</div>