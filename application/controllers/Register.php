<?php
defined('BASEPATH') or exit('No direct script access allowed');
include ".config";

class Register extends CI_Controller
{
    public function index($page = "register_view", $data = array("title" => "tropangpochi"))
    {
        if ($this->session->userdata('user_info') != NULL) {
            redirect('home');
        }

        $this->load->view($page, $data);
    }

    public function validation()
    {
        global $gmailUsername;
        global $gmailPassword;

        $this->form_validation->set_rules("username", "Username", "required|trim|is_unique[user.user_username]");
        $this->form_validation->set_rules("password", "Password", "required|trim");
        $this->form_validation->set_rules("cpassword", "Confirm Password", "required|trim|matches[password]");
        $this->form_validation->set_rules("emailadd", "Email Address", "required|trim|valid_email|is_unique[user.user_email]");

        if ($this->form_validation->run()) {
            $verification_key = mt_rand(100000, 999999);
            //            $encrypted_password = $this->encrypt->encode($this->input->post("password")); if password needs to encrypted
            $data = array(
                "user_username" => $this->input->post("username"),
                "user_password" => $this->input->post("password"),
                "user_email" => $this->input->post("emailadd"),
                "user_code" => $verification_key
            );

            $this->session->set_tempdata($data, NULL, 300);

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
                    $this->session->set_tempdata("message", "Check your email to verify your account!", 1);
                    redirect("login");
                } else {
                    show_error($this->email->print_debugger());
                }
            } else {
                $this->session->set_tempdata("message", "Account not added.", 1);
                redirect("register");
            }
        } else {
            $this->index();
        }
    }

    public function verify_email($code)
    {

        $result = $this->register_model->get_code($code);
        $db_code = $result->user_code;
        $updated = False;

        if ($code === $db_code) {
            $data = array(
                'user_code' => '',
                'user_verification' => 1
            );

            $updated = $this->register_model->verify_user($data, $db_code);

            $this->session->set_tempdata('message', 'User Verified', 1);

            redirect('login');
        }

        $this->index(
            "layouts/main",
            array(
                "code" => $db_code,
                "emailadd" => $result->user_email,
                "updated" => $updated,
                "main_view" => "verification",
                "header_title" => "Verification - Beta Juniors"
            )
        );
    }
}
