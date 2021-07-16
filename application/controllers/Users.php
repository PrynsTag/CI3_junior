<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function login()
    {
        // Setting up rules in login input
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );

        // Set the rules
        $this->form_validation->set_rules($config);

        // Check rules that are violated
        if ($this->form_validation->run() == false) {

            $this->session->set_tempdata('error', 'Your username or password may be incorrect!', 1);

            redirect('login');
        } else {

            // Get input datas from login form
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            // Assigning values from corresponding column names in database
            $data_query = [
                'user_username' => $username,
                'user_password' => $password
            ];

            // Check input data from database
            $user = $this->user_model->login_user($data_query);
            $countUser = count($user);

            // Check user if there is an account
            if ($countUser == 1) {  // Run this code if there is an account

                $user_info = [
                    'user_username' => $username,
                    'user_password' => $password
                ];

                $result = $this->user_model->get_userdata($user_info)[0];

                if ($result->user_verification == 1) {
                    if ($this->user_model->join_userinfo($result->user_id) == NULL) {
                        redirect('users/userinfo_view');
                    } else {
                        $userdata = [
                            'user_id'       => $result->user_id,
                            'user_username' => $result->user_username
                        ];

                        // Set data to SESSION
                        $this->session->set_userdata('user_info', $userdata);

                        redirect('home');
                    }
                } else {
                    redirect('register');
                }
            } else {

                // Show error message from the user
                $this->session->set_tempdata('error', 'You do not have an account yet.', 1);

                // Go to the login form if there is no account
                redirect('login');
            }
        }
    }

    public function userinfo_view()
    {
        $data = [
            'header_title' => 'My Collection - Beta Juniors',
            'main_view' => 'users/userinfo_view',
            'input_title' => array('class' => 'form-control input_text', 'type' => 'text', 'name' => 'title', 'placeholder' => 'Title'),
            'input_description' => array('class' => 'form-control input_text input_textarea', 'type' => 'text', 'name' => 'description', 'placeholder' => 'Description', 'rows' => '3'),
            'input_upload' => array('class' => 'form-control input_text', 'id' => 'imgInp', 'type' => 'file', 'name' => 'image')
        ];

        $this->load->view('layouts/home', $data);
    }

    public function validation()
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

                redirect('users/userinfo_view');
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

                $this->user_model->insertProfile($query_data);

                $user = $this->user_model->get($query_data)[0];

                $session_data = [
                    'user_id' => $user->user_id,
                    'user_username' => $user->user_username
                ];

                $this->session->set_userdata('user_info', $session_data);

                redirect('home');
            }
        }
    }
}
