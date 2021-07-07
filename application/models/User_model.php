<?php


class User_model extends CI_Model
{
    public function insert_user($data){
        $this->db->insert($data);
        return $this->db->insert_id();
    }
}