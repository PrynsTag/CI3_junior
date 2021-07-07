<?php


class Register extends CI_Controller
{
    public function index(){
        $this->load->view('register_view');
    }
    public function validation(){
        $this->form_validation->set_rules("username", "Username", "required|trim|is_unqiue[users.username]");
        $this->form_validation->set_rules("password", "Password", "required|trim");
        $this->form_validation->set_rules("cpassword", "Confirm Password", "required|trim|matches[password]");
        $this->form_validation->set_rules("emailadd", "Email Address", "required|trim|valid_email|is_unique[users.emailadd]");

        if ($this->form_validation->run()){
            $verification_key = mt_rand(100000, 999999);
            $encrypted_password = $this->encrypt->encode($this->input->post("password"));
            $data = array(
                "username" => $this->input->post("username"),
                "password" => $encrypted_password,
                "emailadd" => $this->input->post("emailadd"),
                "code" => $verification_key
            );
            $id = $this->user_model->insert_user($data);
            if ($id > 0){
                $subject = "Please verify your account!";
                $body = "<p>Hi ".$this->input->post('username')."</p>
                <p>Click the link to verify your email address: <a href='".base_url()."register/verify_email/".$verification_key.">Link</a></p>";

                $config = array(
                    "protocol" => "smtp",
                    "smtp_host" => "smtpout.secureserver.net",
                    "smtp_port" => 80,
                    "smtp_user" => ""
                );
            }
        } else {
            $this->index();
        }
    }
}