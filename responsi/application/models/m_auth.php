<?php
class m_auth extends CI_Model
{
    public function login()
    {
        $email = set_value('email');
        $password = set_value('password');

        $result = $this->db->where('email', $email)->where('password', $password)->limit(1)->get('user');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
