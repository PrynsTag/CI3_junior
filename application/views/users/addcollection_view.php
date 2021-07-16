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

<?= isset($alert) ? $alert : "" ?>
<?= isset($error) ? $error : "" ?>
<div class="d-flex justify-content-center form_container_2">
  <?= form_open_multipart("home/addCollection", array('method' => 'post')) ?>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-pager"></i></span>
    </div>
    <?= form_input($input_title); ?>
    <input type="text" name="title" class="form-control input_text" placeholder="Title">
    <small class="text-danger w-100"><?= form_error("title") ?></small>
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
    </div>
    <?= form_textarea($input_description); ?>
    <textarea class="form-control input_text input_textarea"
              name="description"
              placeholder="Description"
              rows="3">
    </textarea>
    <small class="text-danger w-100"><?= form_error("description") ?></small>
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-file-image"></i></span>
    </div>
    <?= form_upload($input_upload); ?>
    <input type="file" name="image" class="form-control input_text" id="imgInp"> <br>
    <small class="text-danger w-100"><?= form_error("image") ?></small>
  </div>
  <div class="d-flex justify-content-center login_container">
    <div class="btn-align">
      <button type="submit" name="submit" class="btn login_btn">Submit</button>
      <a class="back-button" href="<?= base_url("collection/get_collection") ?>">Back</a>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>