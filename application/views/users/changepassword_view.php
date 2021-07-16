<?php
if ($this->session->userdata('user_info') == NULL) {
    redirect('login');
}
?>

<?php if ($this->session->tempdata('error')) : ?>
    <div class="alert alert-danger">
        <p><?= $this->session->tempdata('error') ?></p>
    </div>
<?php endif; ?>

<?php if ($this->session->tempdata('modal_error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->tempdata('modal_error') ?>',
        });
    </script>
<?php endif; ?>

<?php if ($this->session->tempdata('modal_success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $this->session->tempdata('modal_success') ?>',
        });
    </script>
<?php endif; ?>

<div id="registerContainer">
    <div class="d-flex justify-content-center align-items-center flex-column h-100">
        <div class="logo_card">
            <!--Logo-->
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="<?= base_url('uploads/user_profile/') . $user_info->userinfo_image; ?>" class="brand_logo" alt="Logo" id="image_display">
                </div>
            </div>
            <!--Form-->
            <div class="d-flex justify-content-center form_container_2">
                <?php echo form_open('home/changePassword', $form_attributes); ?>
                <h3>Change Password</h3>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <?= form_input($input_currentPassword); ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-unlock"></i></i></span>
                    </div>
                    <?= form_input($input_newPassword); ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                    </div>
                    <?= form_input($input_confirmPassword); ?>
                </div>
                <div class="d-flex justify-content-center login_container">
                    <div class="btn-align">
                        <button type="submit" name="changePassword" class="btn login_btn">Change Password</button> <br>
                        <a class="back-button" href="<?= base_url(); ?>home/settings">Back</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>