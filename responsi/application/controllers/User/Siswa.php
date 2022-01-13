<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Daftar Pelajaran';
        $data['pengguna'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['ambil'] = $this->db->get('ambil')->result_array();
        $data['ambil'] = $this->m_siswa->nilai($data['pengguna']);
        $data['pelajaran'] = $this->db->get('pelajaran')->result_array();
        $data['semester'] = $this->db->get('semester')->result_array();
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Siswa/pelajaran', $data);
        $this->load->view('template/footer_in',);
    }
    public function tambah_pelajaran()
    {
        $data['pengguna'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['ambil'] = $this->db->get('ambil')->result_array();
        $data['ambil'] = $this->m_siswa->pelajaranDipilih($data['pengguna']);
        $nik = $this->m_siswa->ubahnik($data['pengguna']);
        $data['pelajaran'] = $this->db->get('pelajaran')->result_array();

        $data = [
            'kd_pelajaran' => $this->input->post('kd_pelajaran'),
            'nik' => $this->input->post('nik')
        ];
        $nilai = [
            'nik' => $nik,
            'kd_pelajaran' => $this->input->post('kd_pelajaran'),
            'nilai' => '0',
            'kd_semester' => $this->input->post('kd_semester')
        ];
        $this->db->insert('nilai', $nilai);
        $this->db->insert('ambil', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Berhasil Menambah pelajaran</div>');
        redirect('User/Siswa');
    }

    public function tampilNilai()
    {
        $data['title'] = 'Daftar Pelajaran';
        $data['pengguna'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['ambil'] = $this->db->get('ambil')->result_array();
        $data['nilai'] = $this->m_siswa->nilai($data['pengguna']);

        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Siswa/nilai', $data);
        $this->load->view('template/footer_in',);
    }
    public function hapus_pelajaran($id)
    {
        $where = array('id' => $id);
        $nilai = array('id_nilai' => $id);
        $this->m_siswa->hapus_pelajaran($nilai, 'nilai');
        $this->m_siswa->hapus_pelajaran($where, 'ambil');
        redirect('User/Siswa');
    }


    public function pdf()
    {
        $data['pengguna'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nik'] = $this->m_siswa->ubahnik($data['pengguna']);
        $data['nilai'] = $this->m_siswa->nilai($data['pengguna']);
        $this->load->view('Siswa/pdf', $data);
    }
    public function xml()
    {
        $this->load->view('Siswa/mhs_xml');
    }
    public function json()
    {
        $this->load->view('Siswa/mhs_json');
    }
}
