<h1>Login</h1>

<?php echo form_open('users/login', $form_attributes); ?>

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

<?php echo form_close(); ?>