<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Collection extends CI_Controller
{
    public function index($data = array(), $page = "layouts/home")
    {
        $this->load->view($page, $data);
    }

    public function get_collection()
    {
        $user_id = $this->session->userdata('user_info')['user_id'];

        $get_posts = $this->collection_model->get_collection($user_id);

        $data = [
            'header_title' => 'My Collection - Beta Juniors',
            'main_view' => 'users/collection_view',
            'posts' => $get_posts
        ];

        $this->index($data);
    }

    public function add_collection() // For view
    {
        $page = "users/" . $this->uri->segment(2);
        $data = [
            "header_title" => "Add Item - juniors (A JARS Project)",
            "main_view" => $page
        ];

        $this->index($data);
    }

    public function validation()
    {
        if ($this->input->post("submit") !== null) {
            if ($this->form_validation->run()) {
                $this->form_validation->set_rules("title", "Collection Title", "required|trim");
                $this->form_validation->set_rules("description", "Collection Description", "required|trim");
                $this->form_validation->set_rules("image", "Image", "required|trim");
                $result = $this->insert_collection();
                $page = 'users/collection_view';
            } else {
                $result = validation_errors();
                $page = 'users/add_collection';
            }

        } else {
            $result = validation_errors();
            $page = 'users/add_collection';
        }

        $data = [
            'header_title' => 'Add Item - juniors (A JARS Project)',
            'main_view' => $page,
            'error' => $result
        ];

        $this->index($data);
    }

    public function insert_collection() // For INSERT
    {
        $image = $this->input->post("image");
        $uploaded_image = $this->upload_image($image);

        if ($uploaded_image !== False) {
            $user_id = $this->session->userdata("user_id");
            $user = $this->user_model->get_userdata(array("user_id", $user_id))[0];

            $data = [
                "post_title" => $this->input->post("title"),
                "post_description" => $this->input->post("description"),
                "post_photo" => $uploaded_image,
                "user_id" => $user->user_id
            ];
            $id = $this->collection_model->insert_post($data);

            if ($id > 0) {
                $result_alert = "<script> Swal.fire({
                            icon: 'success',
                            title: 'New post added!',
                            text: 'Redirecting to your collection...',
                            }); 
                            </script>";
            } else {
                $result_alert = "<script> Swal.fire({
							icon: 'error',
							title: 'Error',
							text: '";
            }
            $data = [
                'header_title' => 'Add Item - juniors (A JARS Project)',
                'main_view' => 'users/add_collection',
                'alert' => $result_alert
            ];

            $this->index($data);
        } else {
            return $uploaded_image;
        }
    }

    public function upload_image($image)
    {
        $config['upload_path'] = './uploads/posts/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5242880;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        $this->upload->initialize($config);

        if ($this->upload->do_upload($image)) {
            return $config['upload_path'] . $this->upload->data("filename");
        }

        return False;
    }
}


//if (isset($_POST['submit'])) {
//    $title = $_POST['title'];
//    $desc = $_POST['description'];
//    $id = $_SESSION['myid'];
//
//    $errors = array();
//    $file_name = $_FILES['image']['name'];
//    $file_size = $_FILES['image']['size'];
//    $file_tmp = $_FILES['image']['tmp_name'];
//    $file_type = $_FILES['image']['type'];
//    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
//
//    $extensions = array("jpeg", "jpg", "png");
//
//    if (in_array($file_ext, $extensions) === false) {
//        $errors[] = "Invalid Extension (PNG, JPEG & JPG Only)";
//    }
//
//    if ($file_size > 5242880) {
//        $errors[] = "File too large! (Max. 5Mb)";
//    }
//
//    if (empty($errors) == true) {
//        move_uploaded_file($file_tmp, "./uploads/posts/" . $file_name);
//        $link = "./uploads/posts/" . $file_name;
//        $sql = "INSERT INTO `posts`(title,description,photo,user_id) VALUES ('$title','$desc','$link','$id')";
//        $result = $conn->query($sql);
//        echo "<script> Swal.fire({
//                            icon: 'success',
//                            title: 'New post added!',
//                            text: 'Redirecting to your collection...',
//                            }).then(function() {
//                            window.location = \"mycollection.php\";
//                            });
//                            </script>";
//    } else {
//        echo "<script> Swal.fire({
//							icon: 'error',
//							title: 'Error',
//							text: '";
//        foreach ($errors as $value) {
//            echo $value;
//        }
//        echo "',}) </script>";
//    }
//}

