<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function login()
    {
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

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {

            $this->session->set_tempdata('error', validation_errors(), 1);

            redirect('login');
        } else {

            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            $data_query = [
                'user_username' => $username,
                'user_password' => $password
            ];

            $user = $this->user_model->login_user($data_query);
            $countUser = count($user);


            if ($countUser == 1) {

                $user_info = [
                    'user_username' => $username,
                    'user_password' => $password
                ];

                $result = $this->user_model->get_userdata($user_info)[0];

                if (($result->user_verification) == 1) {
                    if ($this->user_model->join_userinfo($result->user_id) == NULL) {

                        // if there is no User Info
                        redirect('users/userinfo_view/' . $result->user_id);
                    } else {
                        $userdata = [
                            'user_id'       => $result->user_id,
                            'user_username' => $result->user_username
                        ];

                        // if there is an existing user info
                        $this->session->set_userdata('user_info', $userdata);

                        redirect('home');
                    }
                } else {
                    redirect('register');
                }
            } else {

                $this->session->set_tempdata('error', 'You do not have an account yet.', 1);

                redirect('login');
            }
        }
    }

    public function userinfo_view($user_id)
    {
        $data = [
            'header_title' => 'Insert User Profile - Beta Juniors',
            'main_view' => 'users/userinfo_view',
            'input_firstname' => array('class' => 'form-control input_text', 'name' => 'firstname', 'type' => 'text', 'placeholder' => 'First Name'),
            'input_lastname' => array('class' => 'form-control input_text', 'name' => 'lastname', 'type' => 'text', 'placeholder' => 'Last Name'),
            'input_bio' => array('class' => 'form-control input_text input_textarea', 'name' => 'bio', 'placeholder' => 'Bio'),
            'input_upload' => array('class' => 'form-control input_text', 'id' => 'imgInp', 'type' => 'file', 'name' => 'image'),
            'user_id' => $user_id
        ];

        $this->load->view('layouts/main', $data);
    }

    public function validation($user_id)
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

            redirect('users/userinfo_view');
        } else {
            $config = [
                'upload_path' => './uploads/user_profile/',
                'allowed_types' => 'jpg|png'
            ];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_tempdata('error', $this->upload->display_errors(), 1);

                redirect('users/userinfo_view');
            } else {
                $firstname = $this->input->post('firstname', true);
                $lastname = $this->input->post('lastname', true);
                $bio = $this->input->post('bio', true);
                $userImage = $this->upload->data('file_name');

                $data = array(
                    'userinfo_firstname' => ucwords(strtolower($firstname)),
                    'userinfo_lastname' => ucwords(strtolower($lastname)),
                    'userinfo_bio' => $bio,
                    'userinfo_image' => $userImage,
                    'user_id' => $user_id
                );

                $this->user_model->insertProfile($data);

                $user = $this->user_model->get_userdata(array('user_id' => $user_id))[0];

                $session_data = [
                    'user_id' => $user_id,
                    'user_username' => $user->user_username
                ];

                $this->session->userdata('user_info', $session_data);
                redirect('home');
            }
        }
    }
}
