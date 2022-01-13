<?php

class Menu extends CI_Controller
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
        session_destroy();
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', "Menu", 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_in', $data);
            $this->load->view('template/sidebar_in', $data);
            $this->load->view('template/topbar_in', $data);
            $this->load->view('Menu/index', $data);
            $this->load->view('template/footer_in',);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Menu Baru Berhasil Ditambah</div>');
            redirect('Admin/Menu');
        }
    }
    public function subMenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', "Judul", 'required');
        $this->form_validation->set_rules('menu_id', "Menu_id", 'required');
        $this->form_validation->set_rules('url', "URL", 'required');
        $this->form_validation->set_rules('icon', "Icon", 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_in', $data);
            $this->load->view('template/sidebar_in', $data);
            $this->load->view('template/topbar_in', $data);
            $this->load->view('Menu/subMenu', $data);
            $this->load->view('template/footer_in',);
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Sub Menu Baru Berhasil Ditambah</div>');
            redirect('Admin/Menu/subMenu');
        }
    }
}
