<?php

class Lupa extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required'  => 'Email wajib diisi!',
            'valid_email'  => 'Email tidak sesuai!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('auth_template/header', $data);
            $this->load->view('auth/lupa');
            $this->load->view('auth_template/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(24));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_create' => time()
                ];

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'lupaPassword');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Silahkan cek email anda untuk reset password</div>');
                redirect('Auth/lupa');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Email belum terdaftar atau belum teraktivasi</div>');
                redirect('Auth/lupa');
            }
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
        if ($type = 'lupaPassword') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'Auth/Lupa/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Active</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubahPassword();
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Reset Password Gagal. Token salah</div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Reset Password Gagal. Email salah</div>');
            redirect('Auth/login');
        }
    }
    public function ubahPassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth/Login');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches'  => 'Password Tidak Sama',
            'required'  => 'Password baru wajib diisi!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]', [
            'required'  => 'Konfirmasi password wajib diisi!',
            'matches'  => 'Password Tidak Sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('auth_template/header', $data);
            $this->load->view('auth/passwordBaru');
            $this->load->view('auth_template/footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" rule="alert">Password berhasil di ubah. Silahkan login</div>');
            redirect('Auth/login');
        }
    }
}
