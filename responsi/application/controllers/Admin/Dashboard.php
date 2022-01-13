<?php

class Dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('template/footer_in',);
    }
}
