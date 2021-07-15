<?php

class Home extends CI_Controller
{
    public function index()
    {
        $get_posts = $this->post_model->featured_shoes();

        $data = [
            'header_title' => 'Home - Beta Juniors',
            'main_view' => 'users/home_view',
            'posts' => $get_posts
        ];

        $this->load->view('layouts/home', $data);
    }

    public function collection()
    {
        $user_id = $this->session->userdata('user_info');

        $get_posts = $this->post_model->my_collection($user_id['user_id']);

        $data = [
            'header_title' => 'My Collection - Beta Juniors',
            'main_view' => 'users/collection_view',
            'posts' => $get_posts
        ];

        $this->load->view('layouts/home', $data);
    }

    public function settings()
    {
        $user = $this->session->userdata('user_info');

        $query_data = [
            'userinfo_id' => $user['user_id']
        ];

        $user_info = $this->user_model->join_userinfo($query_data)[0];

        $data = [
            'header_title' => 'Settings - Beta Juniors',
            'main_view' => 'users/settings_view',
            'user_details' => $user_info
        ];

        $this->load->view('layouts/home', $data);
    }

    public function about()
    {
        $data = [
            'header_title' => 'About - Beta Juniors',
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
        $data = [
            'header_title' => 'Change Profile - Beta Juniors',
            'main_view' => 'users/changepassword_view'
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
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            )
        );
    }

    public function changePassword_View()
    {
        $user = $this->session->userdata('user_info');

        $query_data = [
            'userinfo_id' => $user['user_id']
        ];

        $user_info = $this->user_model->join_userinfo($query_data)[0];

        $data = [
            'header_title' => 'Change Password - Beta Juniors',
            'main_view' => 'users/changepassword_view',
            'form_attributes' => array('method' => 'post', 'enctype' => 'multipart/form-data'),
            'input_currentPassword' => array('class' => 'form-contorl input_text', 'name' => 'currentPassword', 'type' => 'password', 'placeholder' => 'Current Password'),
            'input_newPassword' => array('class' => 'form-contorl input_text', 'name' => 'newPassword', 'type' => 'password', 'placeholder' => 'New Password'),
            'input_confirmPassword' => array('class' => 'form-contorl input_text', 'name' => 'confirmPassword', 'type' => 'password', 'placeholder' => 'Re-enter Password'),
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
                'rules' => 'required|min_length[8]'
            ),
            array(
                'field' => 'newPassword',
                'label' => 'New Password',
                'rules' => 'required|min_length[8]'
            ),
            array(
                'field' => 'confirmPassword',
                'label' => 'Confirm Password',
                'rules' => 'required|min_length[8]|matches[newPassword]'
            )
        );

        $this->form_validation->set_rules($input_rules);

        if ($this->form_validation->run() == false) {
            $message = [
                'error' => validation_errors()
            ];

            $this->session->set_flashdata($message);

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
                $searchData = [
                    'user_id' => $session_userid
                ];

                $newData = [
                    'user_password' => $input_newPassword
                ];

                $this->user_model->changePassword($searchData, $newData);

                $message = [
                    'modal_success' => 'Password Successfully Changed!'
                ];

                $this->session->set_flashdata($message);

                redirect('home/changepassword_view');
            } else {
                $message = [
                    'modal_error' => 'Password Mismatched!'
                ];

                $this->session->set_flashdata($message);

                redirect('home/changepassword_view');
            }
        }
    }
}
