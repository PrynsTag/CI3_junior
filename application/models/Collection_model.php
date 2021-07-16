<?php


class Collection_model extends CI_Model
{

    public function insert_post($data)
    {
        $this->db->where("user_id", $data["user_id"]);
        $this->db->insert("post", $data);
        return $this->db->insert_id();
    }

    public function get_collection($user_id)
    {
        $this->db->where("user_id", $user_id);
        $result = $this->db->get('post');

        return $result->result();
    }
}