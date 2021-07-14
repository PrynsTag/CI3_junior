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
    }

    public function about()
    {
    }

    public function logout()
    {
        $this->session->unset_userdata('user_info');

        redirect('login');
    }
}
