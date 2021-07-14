<?php

class Post_Model extends CI_Model
{
    public function featured_shoes()
    {
        $result = $this->db->query('SELECT * FROM post ORDER BY RAND()');

        return $result->result();
    }
}
