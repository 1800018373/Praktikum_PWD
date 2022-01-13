<?php

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('User/Dashboard');
        }
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', [
            'required'  => 'NIK wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required'  => 'Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required'  => 'Email wajib diisi!',
            'is_unique' => 'Email sudah dipakai',
            'valid_email' => 'Email tidak sesuai'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches'  => 'Password Tidak Sama',
            'required'  => 'Password wajib diisi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $data['kelas'] = $this->db->get('kelas')->result_array();
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign Up';
            $this->load->view('auth_template/header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('auth_template/footer');
        }

        if ($this->form_validation->run() == true) {
            $email = htmlspecialchars($this->input->post('email', true));
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => $email,
                'gambar' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            $data_siswa = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'gender' => '',
                'kd_kelas' => htmlspecialchars($this->input->post('kd_kelas', true)),
                'email' => $email
            ];
            //siapkan token untuk verifikasi
            $token = base64_encode(random_bytes(24));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_create' => time()
            ];
            $this->db->insert('siswa', $data_siswa);
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verifikasi');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert"> Registrasi Berhasil. Silahkan Aktivasi Akun</div>');
            redirect('Auth/login');
        }
    }

    private function _sendEmail($token, $type)
    {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'reydetodos24@gmail.com';
        $config['smtp_pass'] = 'mantapjiwo';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

        $this->email->from('reydetodos24@gmail.com', 'SMAN 1 CIAMIS');
        $this->email->to($this->input->post('email'));
        if ($type = 'verifikasi') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'Auth/Registrasi/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Active</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                // if (time() - $$user_token['date_create'] < (60 * 60 * 24)) {
                $this->db->set('is_active', 1);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->db->delete('user_token', ['email' => $email]);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">' . $email . ' berhasil aktivasi. Silahkan login</div>');
                redirect('Auth/login');
                //} 
                // else {
                //     $this->db->delete('user', ['email' => $email]);
                //     $this->db->delete('user_token', ['email' => $email]);
                //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Aktivasi Akun Gagal karena token kadaluarsa</div>');
                //     redirect('Auth/login');
                // }
            } else {
                $this->db->delete('siswa', ['email' => $email]);
                $this->db->delete('user', ['email' => $email]);
                $this->db->delete('user_token', ['email' => $email]);
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Aktivasi Akun Gagal karena token Salah</div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Aktivasi Akun Gagal karena Email Salah</div>');
            redirect('Auth/login');
        }
    }
}
