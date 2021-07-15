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
        $this->db->select('*');
        $this->db->from('userinfo');
        $this->db->join('user', 'userinfo.userinfo_id = user.user_id', 'inner');
        $query = $this->db->get();

        return $query->result();
    }

    public function updateProfile($data)
    {
        $this->db->where($data);
        $this->db->update('userinfo');
    }

    public function changePassword($searchData, $newData)
    {
        $this->db->where($searchData);
        $this->db->update('user', $newData);
    }
}
