

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
    <div class="d-flex justify-content-center h-100">
        <div class="logo_card">
            <div class="d-flex justify-content-center form_container_2">
                <?php echo form_open_multipart('users/validation/' . $user_id, array('method' => 'post')); ?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <?= form_input($input_firstname); ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                    </div>
                    <?= form_input($input_lastname); ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                    </div>
                    <?= form_textarea($input_bio); ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                    </div>
                    <?= form_upload($input_upload); ?>
                </div>
                <div class="d-flex justify-content-center login_container">
                    <div class="btn-align">
                        <button type="submit" name="submit" class="btn login_btn">Submit</button>
                        <a class="back-button" href="<?= base_url() ?>home/settings">Back</a> <br>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>