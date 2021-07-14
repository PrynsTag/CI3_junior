<?php

class User_Model extends CI_Model
{
    public function login_user($data)
    {
        $this->db->where($data);

        $user = $this->db->get('user');

        return $user->result();
    }

    public function get_userdata($data)
    {
        $this->db->where($data);

        $result = $this->db->get('user');

        return $result->result();
    }
}
