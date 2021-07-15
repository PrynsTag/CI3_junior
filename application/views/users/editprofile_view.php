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

<div id="registerContainer">
    <div class="d-flex justify-content-center h-100">
        <div class="logo_card">
            <!--Logo-->
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="<?= base_url() . $user_details->userinfo_image; ?>" class="brand_logo" alt="Logo" id="image_display">
                </div>
            </div>
            <?php
            // if (isset($_POST['submit'])) {
            //     $firstname = $_POST['firstname'];
            //     $lastname = $_POST['lastname'];
            //     $bio = $_POST['bio'];

            //     $errors = array();
            //     $file_name = $_FILES['image']['name'];
            //     $file_size = $_FILES['image']['size'];
            //     $file_tmp = $_FILES['image']['tmp_name'];
            //     $file_type = $_FILES['image']['type'];
            //     $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

            //     $extensions = array("jpeg", "jpg", "png");

            //     if (in_array($file_ext, $extensions) === false) {
            //         $errors[] = "Invalid Extension (PNG, JPEG & JPG Only)";
            //     }

            //     if ($file_size > 2097152) {
            //         $errors[] = "File too large! (Max. 2Mb)";
            //     }

            //     if (empty($errors) == true) {
            //         move_uploaded_file($file_tmp, "./uploads/user_profile/" . $file_name);
            //         $link = "./uploads/user_profile/" . $file_name;
            //         $sql = "UPDATE userinfo SET firstname = '" . $firstname . "', lastname = '" . $lastname . "', bio = '" . $bio . "', image = '" . $link . "' WHERE `user_id` = '" . $id . "'";
            //         $result = $conn->query($sql);
            //         echo "<script> Swal.fire({
            //                 icon: 'success',
            //                 title: 'Welcome to juniors!',
            //                 text: 'Redirecting to Home Page...',
            //                 }).then(function() {
            //                 window.location = \"settings.php\";
            //                 }); 
            //                 </script>";
            //     } else {
            //         echo "<script> Swal.fire({
            // 				icon: 'error',
            // 				title: 'Error',
            // 				text: '";
            //         foreach ($errors as $value) {
            //             echo $value;
            //         }
            //         echo "',}) </script>";
            //     }
            // }
            // 
            ?>
            <div class="d-flex justify-content-center form_container_2">
                <?php echo form_open_multipart('home/editprofile', $form_attributes); ?>
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
                        <a class="back-button" href="<?= base_url() ?>home/settings">Back</a> <br>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>