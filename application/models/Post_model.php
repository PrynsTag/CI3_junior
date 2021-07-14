<?php

class Post_Model extends CI_Model
{
    public function featured_shoes()
    {
        $result = $this->db->query('SELECT * FROM post ORDER BY RAND()');

        return $result->result();
    }

    public function my_collection($user_id)
    {
        $this->db->where($user_id);

        $result = $this->db->get('post');

        return $result->result();
    }
}
