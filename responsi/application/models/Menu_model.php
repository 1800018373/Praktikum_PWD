<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "select user_sub_menu.*, user_menu.menu from user_sub_menu join user_menu on user_sub_menu.menu_id = user_menu.id";
        return $this->db->query($query)->result_array();
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->like('nik', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('gender', $keyword);
        return $this->db->get()->result();
    }
}