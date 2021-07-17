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

<?= isset($alert) ? $alert : "" ?>
<?= isset($error) ? $error : "" ?>
<div class="addContainer">
  <div class="d-flex flex-column justify-content-center form_container_2" style="margin-top:40px">
    <div class="addImageContainer">
      <img src="<?= base_url("assets/images/default.png"); ?>" class="addImage" alt="Logo" id="image_display">
    </div>
    <div class="container-fluid addFormContainer">
      <?= form_open_multipart("home/addCollection", array('method' => 'post')) ?>
      <div class="input-group mb-3">
        <div class="input-group-append">
          <span class="input-group-text"><i class="fas fa-pager"></i></span>
        </div>
        <?= form_input($input_title); ?>
        <small class="text-danger w-100"><?= form_error("title") ?></small>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-append">
          <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
        </div>
        <?= form_textarea($input_description); ?>

        <small class="text-danger w-100"><?= form_error("description") ?></small>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-append">
          <span class="input-group-text"><i class="fas fa-file-image"></i></span>
        </div>
        <?= form_upload($input_upload); ?>
        <script>
          function readURL(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                $('#image_display').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
          }

          $("#imgInp").change(function() {
            readURL(this);
          });
        </script>
        <small class="text-danger w-100"><?= form_error("image") ?></small>
      </div>
      <div class="d-flex justify-content-center login_container">
        <div class="btn-align">
          <button type="submit" name="submit" class="btn addSubmit_btn">Submit</button>
          <a class="Addback-button" href="<?= base_url("collection/get_collection") ?>">Back</a>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>