<?php if ($this->session->flashdata('error')) : ?>
  <div class="alert alert-danger">
    <p><?= $this->session->flashdata('error') ?></p>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('modal_error')) : ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '<?= $this->session->flashdata('modal_error') ?>',
    });
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('modal_success')) : ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '<?= $this->session->flashdata('modal_success') ?>',
    });
  </script>
<?php endif; ?>

<div class="d-flex justify-content-center form_container_2">
  <?= form_open_multipart("home/addCollection", array('method' => 'post')) ?>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-pager"></i></span>
    </div>
    <?= form_input($input_title); ?>
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
    </div>
    <?= form_textarea($input_description); ?>
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
  </div>
  <div class="d-flex justify-content-center login_container">
    <div class="btn-align">
      <button type="submit" name="submit" class="btn login_btn">Submit</button>
      <a class="back-button" href="<?= base_url("collection") ?>">Back</a>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>