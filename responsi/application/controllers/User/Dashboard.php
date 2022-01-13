<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header_in', $data);
        $this->load->view('template/sidebar_in', $data);
        $this->load->view('template/topbar_in', $data);
        $this->load->view('User/index', $data);
        $this->load->view('template/footer_in',);
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required'  => 'Nama wajib diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_in', $data);
            $this->load->view('template/sidebar_in', $data);
            $this->load->view('template/topbar_in', $data);
            $this->load->view('User/edit', $data);
            $this->load->view('template/footer_in',);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek gambar diupoad
            $upload_gambar = $_FILES['gambar']['name'];
            if ($upload_gambar) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/gambar/profile/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_gambar = $data['user']['gambar'];
                    if ($old_gambar != 'default.jpg') {
                        unlink(FCPATH . 'assets/gambar/profile/' . $old_gambar);
                    }

                    $new_gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Profile telah berhasil di update</div>');
            redirect('User/Dashboard');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
            'required'  => 'Password saat ini wajib diisi!'
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]', [
            'matches'  => 'Password Tidak Sama',
            'required'  => 'Password baru wajib diisi!'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|matches[new_password1]', [
            'required'  => 'Konfirmasi password wajib diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_in', $data);
            $this->load->view('template/sidebar_in', $data);
            $this->load->view('template/topbar_in', $data);
            $this->load->view('User/ubahPassword', $data);
            $this->load->view('template/footer_in',);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Password Saat Ini Salah</div>');
                redirect('User/Dashboard/ubahPassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Password baru tidak boleh sama dengan password lama</div>');
                    redirect('User/Dashboard/ubahPassword');
                } else {
                    //password udah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Ubah Password Berhasil</div>');
                    redirect('User/Dashboard/ubahPassword');
                }
            }
            $current_password = $this->input->post('current_password');
            $current_password = $this->input->post('current_password');
        }
    }
}
