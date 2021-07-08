<?php

class Register_model extends CI_Model
{
    public function insert_user($data)
    {
        $this->db->insert("users", $data);
        return $this->db->insert_id();
    }
}