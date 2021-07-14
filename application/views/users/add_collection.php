<div class="d-flex justify-content-center form_container_2">
  <?= form_open_multipart("collection/validation") ?>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-pager"></i></span>
    </div>
    <input type="text" name="title" class="form-control input_text" placeholder="Title" required>
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
    </div>
    <textarea class="form-control input_text input_textarea"
              name="description"
              placeholder="Description"
              required
              rows="3">
    </textarea>
  </div>
  <div class="input-group mb-3">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-file-image"></i></span>
    </div>
    <input type="file" name="image" class="form-control input_text" id="imgInp" required> <br>
    <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#image_display').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#imgInp").change(function () {
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
  </form>
</div>