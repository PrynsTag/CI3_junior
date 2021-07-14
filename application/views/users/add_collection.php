<?= isset($alert) ? $alert : "" ?>
<?= isset($error) ? $error : "" ?>
<div class="d-flex justify-content-center form_container_2">
  <?= form_open_multipart("collection/validation") ?>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-pager"></i></span>
    </div>
    <input type="text" name="title" class="form-control input_text" placeholder="Title">
    <small class="text-danger w-100"><?= form_error("title") ?></small>
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
    </div>
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
    <input type="file" name="image" class="form-control input_text" id="imgInp"> <br>
    <small class="text-danger w-100"><?= form_error("image") ?></small>
  </div>
  <div class="d-flex justify-content-center login_container">
    <div class="btn-align">
      <button type="submit" name="submit" class="btn login_btn">Submit</button>
      <a class="back-button" href="<?= base_url("collection/get_collection") ?>">Back</a>
    </div>
  </div>
  </form>
</div>