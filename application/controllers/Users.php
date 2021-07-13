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
        if ($this->form_validation->run() == false) {   // Run this code if rules are violated
            $message = [
                'error' => validation_errors()
            ];

            // Show the error message from the user
            $this->session->set_flashdata($message);

            // Go to this section if violated some rules
            redirect('home');
        } else {                                        // Run this code if rules are not violated

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
            if ($countUser == 1) { // Run this code if there is an account

                // Message that will display in modal
                $message = [
                    'success' => 'Successfully login.'
                ];

                // Show success message from the user
                $this->session->set_flashdata($message);

                // Go to this section if login is success
                redirect('home');
            } else { // Run this code if there is no account

                // Message that will display in modal
                $message = [
                    'error' => 'You do not have an account yet.'
                ];

                // Show error message from the user
                $this->session->set_flashdata($message);

                // Go to the login form if there is no account
                redirect('home');
            }
        }
    }
}
