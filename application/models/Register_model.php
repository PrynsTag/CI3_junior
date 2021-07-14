<?php

class Register_model extends CI_Model
{
    public function insert_user($data)
    {
        $this->db->insert("user", $data);
        return $this->db->insert_id();
    }

    public function get_code($uri_code)
    {
        $query = $this->db->get_where("user", array("user_code" => $uri_code));
        $result = $query->result();
        return $result;
    }
}