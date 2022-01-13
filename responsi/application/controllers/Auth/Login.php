<?php

class Login extends CI_Controller
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
        session_destroy();
        $data['title'] = 'Sign In';
        $this->load->view('auth_template/header', $data);
        $this->load->view('auth/login');
        $this->load->view('auth_template/footer');
    }
    public function loginUser()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required'  => 'Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required'  => 'Password wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Sign In';
            $this->load->view('auth_template/header', $data);
            $this->load->view('Auth/Login');
            $this->load->view('auth_template/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // user ada
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Admin/Dashboard');
                    }
                    if ($user['role_id'] == 2) {
                        redirect('User/Dashboard');
                    }
                    if ($user['role_id'] == 3) {
                        redirect('Guru/Dashboard');
                    }
                    redirect('User/Dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Password Salah</div>');
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Email Belum Diaktivasi</div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" rule="alert">Email Tidak Terdaftar</div>');
            redirect('Auth/login');
        }
    }

    public function blocked()
    {
        $this->load->view('Auth/blocked');
    }
}


// if ($this->form_validation->run() == TRUE && $this->m_auth->login() == FALSE) {
//     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Anda Salah!</div>');
//     redirect('Auth/Login');
// }
// if ($this->form_validation->run() == TRUE && $this->m_auth->login() == TRUE) {

//     $this->session->set_userdata('email', $this->m_auth->login()->email);
//     $this->session->set_userdata('role_id', $this->m_auth->login()->role_id);

//     switch ($this->m_auth->login()->role_id) {
//         case 1:
//             redirect('Admin/Dashboard');
//             break;

//         case 2:
//             redirect('User/Dashboard');
//             break;

//         default:
//             break;
//     }
// }