<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page | SharedGame';
            $this->load->view('includes/auth_header', $data);
            $this->load->view('includes/login');
            $this->load->view('includes/auth_footer');
        } else {
            //Validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //Email ada

        } else {
            //Email tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');

            //Redirect ke Login
            redirect('auth');
        }
    }

    public function registration()
    {

        //Validasi Nama
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama Lengkap harus diisi!'
        ]);

        //Validasi Email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);

        //Validasi Password
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek(min. 8 karakter)!'
        ]);

        //Validasi Repeat Password
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');

        //Validasi Email
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page | SharedGame';
            $this->load->view('includes/auth_header', $data);
            $this->load->view('includes/registration');
            $this->load->view('includes/auth_footer');
        } else {
            //date_default_timezone_set('Asia/Manila');
            //Pengiriman data melalui array
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'alamat_lengkap' => "empty",
                'no_hp' => "empty",
                'no_hp_dua' => "empty",
                'tgl_lahir' => "0000-00-00",
                'foto_ktp' => "empty",
                'foto_selfie_ktp' => "empty",
                'user_level' => "customer",
                'status_ktp' => "belum",
                'is_active' => "yes",
                'created_at' => date('y-m-d h:i:s', now()),
                'updated_at' => date('y-m-d h:i:s', now())
            ];

            //Kirim ke tabel user
            $this->db->insert('user', $data);

            //Alert akun berhasil dibuat
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat! Silakan login.</div>');

            //Redirect ke Login
            redirect('auth');
        }
    }
}
