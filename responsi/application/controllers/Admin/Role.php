<?php

class Role extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Auth/login');
        }
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Admin/role', $data);
        $this->load->view('template/footer_in',);
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Admin/roleAccess', $data);
        $this->load->view('template/footer_in',);
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Access Change</div>');
    }
}
