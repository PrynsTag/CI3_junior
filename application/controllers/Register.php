<?php
defined('BASEPATH') or exit('No direct script access allowed');
include ".config";

class Register extends CI_Controller
{
    public function index()
    {
        $this->load->view('register_view');
    }

    public function validation()
    {
        global $gmailUsername;
        global $gmailPassword;

        $this->form_validation->set_rules("username", "Username", "required|trim|is_unique[users.username]");
        $this->form_validation->set_rules("password", "Password", "required|trim");
        $this->form_validation->set_rules("cpassword", "Confirm Password", "required|trim|matches[password]");
        $this->form_validation->set_rules("emailadd", "Email Address", "required|trim|valid_email|is_unique[users.emailadd]");

        if ($this->form_validation->run()) {
            $verification_key = mt_rand(100000, 999999);
//            $encrypted_password = $this->encrypt->encode($this->input->post("password")); if password needs to encrypted
            $data = array(
                "username" => $this->input->post("username"),
                "password" => $this->input->post("password"),
                "emailadd" => $this->input->post("emailadd"),
                "code" => $verification_key
            );

            $id = $this->register_model->insert_user($data);

            if ($id > 0) {
                $subject = "Please verify your account!";
                $message = "<p>Hi " . $this->input->post('username') . "</p>" . "
                         <p>Click the link to verify your email address: " . "
                         <a href=" . base_url() . "register/verify_email/" . $verification_key . ">Link</a></p>";

                $config = array(
                    "protocol" => "smtp",
                    "smtp_host" => "smtp.gmail.com",
                    "smtp_port" => 587,
                    "_smtp_auth" => TRUE,
                    "smtp_user" => $gmailUsername,
                    "smtp_crypto" => "tls",
                    "smtp_pass" => $gmailPassword,
                    "send_multipart" => FALSE,
                    "mailtype" => "html",
                    "charset" => "utf-8",
                    "wordwrap" => TRUE,
                );

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($gmailUsername);
                $this->email->to($this->input->post("emailadd"));
                $this->email->subject($subject);
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->session->set_flashdata("message", "Check your email to verify your account!");
                    redirect("register");
                } else {
                    show_error($this->email->print_debugger());
                }
            } else {
                $this->session->set_flashdata("message", "Account not added.");
                redirect("register");
            }
        } else {
            $this->index();
        }
    }
}