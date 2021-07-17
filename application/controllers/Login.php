<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$data = [
			'header_title' => 'Login - Beta Juniors',
			'main_view' => 'users/login_view',
			'group_name' => 'Beta Juniors',
			'form_logo' => base_url() . 'assets/images/BJ-ICON.png',
			'input_username' => array('class' => 'form-control input_user textbox-text', 'id' => 'username', 'name' => 'username', 'type' => 'text', 'placeholder' => 'Username'),
			'input_password' => array('class' => 'form-control input_pass textbox-text', 'id' => 'password', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Password'),
			'input_submit' => array('class' => 'btn login_btn', 'id' => 'submit', 'name' => 'submit', 'type' => 'submit', 'value' => 'Login'),
			'form_attributes' => array('class' => 'form_horizontal', 'id' => 'form', 'method' => 'post')
		];

		$this->load->view('layouts/main', $data);
	}
}
