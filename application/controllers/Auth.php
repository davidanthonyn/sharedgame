<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->session->keep_flashdata('message');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Mohon memasukkan email yang valid!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi!',
        ]);

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

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        //Jika email user ada
        if ($user) {
            //Jika usernya aktif
            if ($user['is_active'] == 'yes') {
                //Cek password
                if (password_verify($password, $user['password'])) {
                    //Pengiriman history login
                    $loginhistory = [
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'time_login' => $now
                    ];

                    //Kirim ke tabel user
                    $this->db->insert('loginhistory', $loginhistory);

                    //Memasukkan data email dan userlevel ke session
                    $data = [
                        'email' => $user['email'],
                        'user_level' => $user['user_level']
                    ];

                    //Set userdata email dan session
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    //Password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau password salah!</div>');

                    //Redirect ke Login
                    redirect('auth');
                }
            } else if ($user['is_active'] == 'not_yet_activated') {
                //Akun belum diaktivasi
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum diaktivasi!</div>');

                //Redirect ke Login
                redirect('auth');
            }
        } else if ($user['is_active'] == 'off_by_admin') {
            //Akun dimatikan oleh admin
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda dimatikan oleh admin. Mohon menghubungi pihak administrasi!</div>');

            //Redirect ke Login
            redirect('auth');
        } else if ($user['is_active'] == 'off_by_user') {
            //User menghapus akun sendiri
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun telah dihapus oleh Anda!</div>');

            //Redirect ke Login
            redirect('auth');
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
            'required' => 'Email harus diisi!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);

        //Validasi Password
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Password harus diisi!',
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek(min. 8 karakter)!'
        ]);

        //Validasi Repeat Password
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');


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
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'alamat_lengkap' => "empty",
                'no_hp' => "empty",
                'no_hp_dua' => "empty",
                'tgl_lahir' => "0000-00-00",
                'foto_ktp' => "empty",
                'foto_selfie_ktp' => "empty",
                'user_level' => "customer",
                'status_ktp' => "belum",
                'is_active' => "yes",
                'created_at' => $now,
                'updated_at' => $now
            ];

            //Kirim ke tabel user
            $this->db->insert('user', $data);

            //Alert akun berhasil dibuat
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Akun berhasil dibuat! 
            Silakan login.</div>');

            //Redirect ke Login
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_level');

        //Alert akun berhasil dibuat
        $this->session->set_flashdata('message', '<div class="alert 
        alert-success" role="alert">Berhasil logout!</div>');

        //Redirect ke Login
        redirect('auth');
    }
}
