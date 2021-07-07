<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data = [
			'main_view' => "users/login_view",
			'label_username' => array('id' => 'username', 'for' => 'username'),
			'input_username' => array('class' => 'form-control', 'id' => 'username', 'name' => 'username', 'type' => 'text'),
			'label_password' => array('id' => 'password', 'for' => 'password'),
			'input_password' => array('class' => 'form-control', 'id' => 'password', 'name' => 'password', 'type' => 'password'),
			'input_submit' => array('class' => 'btn btn-primary', 'id' => 'submit', 'name' => 'submit', 'type' => 'submit', 'value' => 'Login'),
			'form_attributes' => array('class' => 'form_horizontal', 'id' => 'form', 'method' => 'post')
		];

		$this->load->view('layouts/main', $data);
	}
}
