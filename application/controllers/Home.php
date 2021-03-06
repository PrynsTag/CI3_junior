<?php

class Home extends CI_Controller
{
    public function index()
    {
        $get_posts = $this->post_model->featured_shoes();

        $data = [
            'header_title' => 'Home - Beta Jr.',
            'main_view' => 'users/home_view',
            'posts' => $get_posts
        ];

        $this->load->view('layouts/home', $data);
    }

    public function collection()
    {
        $user_id = $this->session->userdata('user_info')["user_id"];

        $get_posts = $this->collection_model->get_collection($user_id);

        $data = [
            'header_title' => 'My Collection - Beta Jr.',
            'main_view' => 'users/collection_view',
            'posts' => $get_posts
        ];

        $this->load->view('layouts/home', $data);
    }

    public function addCollection_View()
    {

        $data = [
            'header_title' => 'My Collection - Beta Jr.',
            'main_view' => 'users/addcollection_view',
            'input_title' => array('class' => 'form-control input_text', 'type' => 'text', 'name' => 'title', 'placeholder' => 'Title'),
            'input_description' => array('class' => 'form-control input_text input_textarea', 'type' => 'text', 'name' => 'description', 'placeholder' => 'Description', 'rows' => '3'),
            'input_upload' => array('class' => 'form-control input_text', 'id' => 'imgInp', 'type' => 'file', 'name' => 'image')
        ];

        $this->load->view('layouts/home', $data);
    }

    public function addCollection()
    {
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'image',
                'label' => 'Image'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->session->set_tempdata('error', validation_errors(), 1);

            redirect('home/addcollection_view');
        } else {
            $image_config = [
                'upload_path' => './uploads/posts/',
                'allowed_types' => 'jpg|png'
            ];

            $this->upload->initialize($image_config);

            if (!$this->upload->do_upload('image')) {

                $this->session->set_tempdata('error', $this->upload->display_errors(), 1);

                redirect('home/addcollection_view');
            } else {

                $session_data = $this->session->userdata('user_info');
                $title = $this->input->post('title', true);
                $description = $this->input->post('description', true);
                $post_photo = $this->upload->data('file_name');

                $query_data = [
                    'post_title' => $title,
                    'post_description' => $description,
                    'post_photo' => $post_photo,
                    'user_id' => $session_data['user_id']
                ];

                $this->post_model->addPost($query_data);

                $this->session->set_tempdata('modal_success', 'You added a new post', 1);

                redirect('collection/get_collection');
            }
        }
    }

    public function editCollection_View($post_id)
    {
        $query_data = [
            'post_id' => $post_id
        ];

        $db_data = $this->post_model->getPost($query_data)[0];
        $data = [
            'header_title' => 'Edit Post - Beta Jr.',
            'main_view' => 'users/editcollection_view',
            'input_title' => array('class' => 'form-control input_text', 'name' => 'title', 'type' => 'text', 'placeholder' => 'Title', 'value' => $db_data->post_title),
            'input_description' => array('class' => 'form-control input_text input_textarea', 'name' => 'description', 'placeholder' => 'Description', 'value' => $db_data->post_description, 'rows' => '3'),
            'input_upload' => array('class' => 'form-control input_text', 'id' => 'imgInp', 'name' => 'image', 'type' => 'file'),
            'post_details' => $db_data
        ];

        $this->load->view('layouts/main', $data);
    }

    public function editCollection($post_id)
    {

        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'image',
                'label' => 'Image'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->session->set_tempdata('error', validation_errors(), 1);

            redirect('home/editcollection_view/' . $post_id);
        } else {
            $image_config = [
                'upload_path' => './uploads/posts/',
                'allowed_types' => 'jpg|png'
            ];

            $this->upload->initialize($image_config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_tempdata('error', $this->upload->display_errors(), 1);

                redirect('home/editcollection_view/' . $post_id);
            } else {
                $user_id = $this->session->userdata('user_info')['user_id'];
                $title = $this->input->post('title', true);
                $description = $this->input->post('description', true);
                $post_photo = $this->upload->data('file_name');

                $query_data = [
                    'post_title' => $title,
                    'post_description' => $description,
                    'post_photo' => $post_photo,
                    'user_id' => $user_id
                ];

                $this->post_model->editPost($post_id, $query_data);

                $this->session->set_tempdata('modal_success', 'You added a new post', 1);

                redirect('home/editcollection_view/' . $post_id);
            }
        }
    }

    public function deleteCollection($post_id)
    {
        $this->post_model->deletePost($post_id);

        redirect('home/collection');
    }

    public function editCollection_back()
    {
        $this->session->unset_userdata('post_info');

        redirect('home/collection');
    }

    public function settings()
    {
        $user = $this->session->userdata('user_info');

        $user_info = $this->user_model->join_userinfo($user['user_id'])[0];

        $data = [
            'header_title' => 'Settings - Beta Jr.',
            'main_view' => 'users/settings_view',
            'user_details' => $user_info
        ];

        $this->load->view('layouts/home', $data);
    }

    public function about()
    {
        $data = [
            'header_title' => 'About - Beta Jr.',
            'main_view' => 'users/about_view'
        ];

        $this->load->view('layouts/home', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user_info');

        redirect('login');
    }

    public function editProfile_View()
    {
        $session_data = $this->session->userdata('user_info');

        $db_userdata = $this->user_model->join_userinfo($session_data['user_id'])[0];

        $data = [
            'header_title' => 'Edit Profile - Beta Jr.',
            'main_view' => 'users/editprofile_view',
            'user_details' => $db_userdata,
            'form_attributes' => array('method' => 'post'),
            'input_firstname' => array('class' => 'form-control input_text', 'name' => 'firstname', 'type' => 'text', 'placeholder' => 'First Name', 'value' => $db_userdata->userinfo_firstname),
            'input_lastname' => array('class' => 'form-control input_text', 'name' => 'lastname', 'type' => 'text', 'placeholder' => 'Last Name', 'value' => $db_userdata->userinfo_lastname),
            'input_bio' => array('class' => 'form-control input_text input_textarea', 'name' => 'bio', 'placeholder' => 'Bio', 'value' => $db_userdata->userinfo_bio, 'rows' => '5'),
            'input_upload' => array('class' => 'form-control input_text', 'id' => 'imgInp', 'type' => 'file', 'name' => 'image'), array('value' => base_url() . $db_userdata->userinfo_image)
        ];

        $this->load->view('layouts/main', $data);
    }

    public function editProfile()
    {
        $input_rules = array(
            array(
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required|min_length[3]'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required|min_length[3]'
            ),
            array(
                'field' => 'bio',
                'label' => 'Bio',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($input_rules);

        if ($this->form_validation->run() == false) {
            $this->session->set_tempdata('error', validation_errors(), 1);

            redirect('home/editprofile_view');
        } else {
            $config = [
                'upload_path' => './uploads/user_profile/',
                'allowed_types' => 'jpg|png'
            ];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_tempdata('error', $this->upload->display_errors(), 1);

                redirect('home/editprofile_view');
            } else {
                $firstname = $this->input->post('firstname', true);
                $lastname = $this->input->post('lastname', true);
                $bio = $this->input->post('bio', true);
                $userImage = $this->upload->data('file_name');

                $data = array(
                    'userinfo_firstname' => ucwords(strtolower($firstname)),
                    'userinfo_lastname' => ucwords(strtolower($lastname)),
                    'userinfo_bio' => $bio,
                    'userinfo_image' => $userImage
                );

                $session_data = $this->session->userdata('user_info');

                $this->user_model->updateProfile($session_data['user_id'], $data);

                $this->session->set_tempdata('modal_success', 'Edit Success', 1);

                redirect('home/editprofile_view');
            }
        }
    }

    public function changePassword_View()
    {
        $user = $this->session->userdata('user_info');

        $user_info = $this->user_model->join_userinfo($user['user_id'])[0];

        $data = [
            'header_title' => 'Change Password - Beta Jr.',
            'main_view' => 'users/changepassword_view',
            'form_attributes' => array('method' => 'post', 'enctype' => 'multipart/form-data'),
            'input_currentPassword' => array('class' => 'form-control input_text', 'name' => 'currentPassword', 'type' => 'password', 'placeholder' => 'Current Password'),
            'input_newPassword' => array('class' => 'form-control input_text', 'name' => 'newPassword', 'type' => 'password', 'placeholder' => 'New Password'),
            'input_confirmPassword' => array('class' => 'form-control input_text', 'name' => 'confirmPassword', 'type' => 'password', 'placeholder' => 'Re-enter Password'),
            'user_info' => $user_info
        ];

        $this->load->view('layouts/main', $data);
    }

    public function changePassword()
    {
        $input_rules = array(
            array(
                'field' => 'currentPassword',
                'label' => 'Current Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'newPassword',
                'label' => 'New Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'confirmPassword',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[newPassword]'
            )
        );

        $this->form_validation->set_rules($input_rules);

        if ($this->form_validation->run() == false) {
            $this->session->set_tempdata('error', validation_errors(), 1);

            redirect('home/changepassword_view');
        } else {

            $session_userid = $this->session->userdata('user_info')['user_id'];

            $query_data = [
                'user_id' => $session_userid
            ];

            $db_Password = $this->user_model->get_userdata($query_data)[0]->user_password;
            $input_currentPassword = $this->input->post('currentPassword', true);
            $input_newPassword = $this->input->post('newPassword', true);

            if ($db_Password == $input_currentPassword) {

                $this->user_model->changePassword($session_userid, $input_newPassword);

                $this->session->set_tempdata('modal_success', 'Password Successfully Changed!', 1);

                redirect('home/changepassword_view');
            } else {
                $this->session->set_tempdata('modal_error', 'Password Mismatched!', 1);

                redirect('home/changepassword_view');
            }
        }
    }
}
