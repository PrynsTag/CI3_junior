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

    public function join_userinfo($query_data)
    {
        // $this->db->where($data);
        // $this->db->select('*');
        // $this->db->from('user');
        // $query = $this->db->join('userinfo', 'user.user_id', 'userinfo.userinfo_id', 'inner');
        // $query = $this->db->query();
        $this->db->select('*');
        $this->db->from('userinfo');
        $this->db->join('user', 'userinfo.userinfo_id = user.user_id', 'inner');
        $query = $this->db->get();

        return $query->result();
    }
}
