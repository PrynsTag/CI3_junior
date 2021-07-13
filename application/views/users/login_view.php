<h1>Login</h1>

<?php echo form_open('users/login', $form_attributes); ?>

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

<div class="form-group">
    <?php echo form_label('Username', 'username'); ?>
    <?php echo form_input($input_username); ?>
</div>

<div class="form-group">
    <?php echo form_label('Password', 'password'); ?>
    <?php echo form_input($input_password); ?>
</div>

<div class="form-group">
    <?php echo form_input($input_submit); ?>
</div>

<p>Don't have an account?&nbsp<a class="" href="<?= base_url() ?>register">Register </a></p>&nbsp

<?php echo form_close(); ?>