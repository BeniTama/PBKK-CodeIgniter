<?php

class Auth_model extends CI_Model
{
    public function authorize()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result   = $this->db->where('username', $username)->where('password', $password)->limit(1)->get('users');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
