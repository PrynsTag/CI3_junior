<nav class="navbar navbar-light bg-light logo-change" style="padding:0;">
  <div class="container-fluid">
    <p>JARS</p>
  </div>
</nav>
<div id="verificationContainer">
  <div class="d-flex justify-content-center h-100">
    <div class="logo_card">
      <div class="d-flex justify-content-center">
        <div class="brand_logo_container_login">
          <img src="../../assets/images/BJ-ICON.png" class="brand_logo" alt="Logo">
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="ver_heading">
          <h4>Email Verification</h4>
          <p>We've sent a verification code to your email: </p>
          <p id="email-add-disp"><?php echo $emailadd; ?></p>
        </div>
      </div>
      <div class="d-flex justify-content-center form_container">
        <?php
        if ($updated != true) {
          echo
          "<script> Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Wrong Code! Please try again...',
							}) </script>";
        }
        ?>
        <?= form_open("home") ?>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
          </div>
          <input type="text" id="code" name="code" class="form-control input_ver" placeholder="Enter verification code"
                 value=<?= $code ?> required>
        </div>
        <div class="d-flex justify-content-center login_container">
          <input type="submit" name="submit" class="btn login_btn" value="Submit" style="margin-top:10px;">
        </div>
        <div class="mt-4">
          <div class="d-flex justify-content-end links">
            <a href="<?= base_url() ?>home/logout" class="signup">Logout</a>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>