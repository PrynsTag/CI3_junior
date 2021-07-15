<?php if ($this->session->flashdata('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->flashdata('error') ?>',
        });
    </script>
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

<div id="registerContainer">
    <div class="d-flex justify-content-center align-items-center flex-column h-100">
        <div class="logo_card">
            <!--Logo-->
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="<?= base_url() . $user_info->userinfo_image; ?>" class="brand_logo" alt="Logo" id="image_display">
                </div>
            </div>
            <!--Form-->
            <?php
            // $sql = $conn->query("SELECT * FROM `users` WHERE `id` = $userid");
            // $row = $sql->fetch_assoc();

            // if (isset($_POST['changePassword'])) {
            //     $currentPassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['currentPassword']));
            //     $newPassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['newPassword']));
            //     $confirmNewPassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['confirmNewPassword']));
            //     if ($row['password'] == $currentPassword) {
            //         if ($newPassword == $confirmNewPassword) {
            //             $conn->query("UPDATE users SET password = '" . $newPassword . "'  WHERE `id` = '" . $_SESSION['myid'] . "'");
            //             echo "<script> Swal.fire({
            //                         icon: 'success',
            //                         title: 'Password Successfully Changed!',
            //                         text: 'Redirecting to Settings...',
            //                         }).then(function() {
            //                         window.location = \"settings.php\";
            //                         }); 
            //                         </script>";
            //         } else {
            //             echo "<script> Swal.fire({
            //                         icon: 'error',
            //                         title: 'Error',
            //                         text: 'Password Mismatched!',
            //                         }); 
            //                         </script>";
            //         }
            //     } else {
            //         echo "<script> Swal.fire({
            //                     icon: 'error',
            //                     title: 'Error',
            //                     text: 'Inputted Password Does Not Match Current Password!',
            //                     }); 
            //                     </script>";
            //     }
            // }

            ?>

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