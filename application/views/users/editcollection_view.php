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
                    <img src="<?= base_url("uploads/posts/") . $post_details->post_photo ?>" class="brand_logo" alt="Logo" id="image_display">
                </div>
            </div>
            <!--Form-->
            <?php
            // if (isset($_POST['submit'])) {
            //     $title = $_POST['title'];
            //     $desc = $_POST['description'];
            //     $id = $_SESSION['myid'];

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

            //     if ($file_size > 5242880) {
            //         $errors[] = "File too large! (Max. 5Mb)";
            //     }

            //     if (empty($errors) == true) {
            //         move_uploaded_file($file_tmp, "./uploads/posts/" . $file_name);
            //         $link = "./uploads/posts/" . $file_name;
            //         $sql = "UPDATE posts SET title = '" . $title . "', description = '" . $desc . "', photo = '" . $link . "' WHERE `post_id` = '" . $post_id . "'";
            //         $result = $conn->query($sql);
            //         echo "<script> Swal.fire({
            //                 icon: 'success',
            //                 title: 'Welcome to juniors!',
            //                 text: 'Redirecting to Home Page...',
            //                 }).then(function() {
            //                 window.location = \"mycollection.php\";
            //                 }); 
            //                 </script>";
            //     } else {
            //         $sql = "UPDATE posts SET title = '" . $title . "', description = '" . $desc . "' WHERE `post_id` = '" . $post_id . "'";
            //         $result = $conn->query($sql);
            //         echo "<script> Swal.fire({
            //                 icon: 'success',
            //                 title: 'Welcome to juniors!',
            //                 text: 'Redirecting to Home Page...',
            //                 }).then(function() {
            //                 window.location = \"mycollection.php\";
            //                 }); 
            //                 </script>";
            //     }
            // }
            ?>
            <div class="d-flex justify-content-center form_container_2">
                <?php echo form_open_multipart('home/editCollection/' . $post_details->post_id, array('method' => 'post')); ?>
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
                    <?= form_textarea($input_description) ?>
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
                        <button type="submit" name="submit" class="btn login_btn">Submit</button> <br>
                        <a class="back-button" href="<?= base_url('home/editcollection_back'); ?>">Back</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>