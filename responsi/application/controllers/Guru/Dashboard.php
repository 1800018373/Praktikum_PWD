<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Auth/login');
        }
    }
    public function index()
    {
        $data['title'] = 'Daftar Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['siswa'] = $this->m_siswa->tampilSiswa('');
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_search', $data);
        $this->load->view('Guru/siswa', $data);
        $this->load->view('template/footer_in',);
    }
    public function tampilKelas()
    {
        $data['title'] = 'Daftar Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Guru/kelas', $data);
        $this->load->view('template/footer_in',);
    }
    public function siswaKelas($kd_kelas, $kelas)
    {
        $data['title'] = $kelas;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->m_siswa->tampilSiswa($kd_kelas);
        $data['pelajaran'] = $this->db->get('pelajaran')->result_array();
        $data['semester'] = $this->db->get('semester')->result_array();

        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Guru/siswaKelas', $data);
        $this->load->view('template/footer_in',);
    }

    public function siswa_pelajaran()
    {
        $kd_pelajaran = $this->input->post('kd_pelajaran');
        $kd_semester = $this->input->post('kd_semester');
        $kelas = $this->input->post('kelas');
        $kategori = [
            'kd_pelajaran' => $kd_pelajaran,
            'kd_semester' => $kd_semester,
            'kelas' => $kelas
        ];

        $data['title'] = $kelas;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa_pelajaran'] = $this->m_siswa->tampilSiswaPelajaran($kategori);

        $data['pelajaran'] = $this->db->get('pelajaran')->result_array();
        $data['semester'] = $this->db->get('semester')->result_array();
        // var_dump($data['siswa_pelajaran']);
        // die;
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Guru/siswa_pelajaran', $data);
        $this->load->view('template/footer_in',);
    }

    public function ubahNilai($id_nilai)
    {
        $kd_pelajaran = $this->input->post('kd_pelajaran');
        $kd_semester = $this->input->post('kd_semester');
        $kelas = $this->input->post('kelas');
        $kategori = [
            'kd_pelajaran' => $kd_pelajaran,
            'kd_semester' => $kd_semester,
            'kelas' => $kelas,
            'id_nilai' => $id_nilai
        ];
        $data['title'] = 'Ubah Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_nilai'] = $this->m_siswa->tampil_update_nilai($kategori);
        $data['pelajaran'] = $this->db->get('pelajaran')->result_array();
        $data['semester'] = $this->db->get('semester')->result_array();
        // var_dump($data['siswa_pelajaran']);
        // die;
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('Guru/ubahNilai', $data);
        $this->load->view('template/footer_in',);
    }
    public function update_nilai()
    {
        $id_nilai = $this->input->post('id_nilai');
        $nilai = $this->input->post('nilai');
        $data = array(
            'id_nilai'  => $id_nilai,
            'nilai' => $nilai,
        );
        $where = array(
            'id_nilai' => $id_nilai
        );

        $this->m_siswa->update_nilai($where, $data, 'nilai');
        redirect('Guru/Dashboard/tampilKelas');
    }

    public function search()
    {
        $data['title'] = 'Daftar Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->m_siswa->get_keyword($keyword);
        // $data['siswa'] = $this->db->get('siswa')->result_array();

        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_search', $data);
        $this->load->view('Guru/siswa', $data);
        $this->load->view('template/footer_in',);
    }
}
