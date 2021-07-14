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
        $user_id = $this->session->userdata('user_id');

        $get_posts = $this->post_model->my_collection($user_id);

        $data = [
            'header_title' => 'My Collection - Beta Juniors',
            'main_view' => 'users/collection_view',
            'posts' => $get_posts
        ];

        $this->load->view('layouts/home', $data);
    }

    public function settings()
    {
        $user = $this->session->userdata();

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
        $user_id = $this->session->userdata('user_id');

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

    public function editProfile()
    {
    }

    public function changePassword()
    {
    }
}
