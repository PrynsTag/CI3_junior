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

    public function settings()
    {
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
}
