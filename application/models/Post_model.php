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

    public function addPost($data)
    {
        $this->db->insert('post', $data);
    }

    public function getPost($data)
    {
        $this->db->where($data);
        $result = $this->db->get('post');

        return $result->result();
    }

    public function editPost($post_id, $data)
    {
        $this->db->where('post_id', $post_id);
        $this->db->set($data);
        $this->db->update('post');
    }

    public function deletePost($post_id)
    {
        $this->db->where('post_id', $post_id);
        $this->db->delete('post');
    }
}
