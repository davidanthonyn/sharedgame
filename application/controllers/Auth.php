<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('');
        }

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

        //Mengambil email
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

                    /*
                    //Taruh data session ke array
                    $data = array(
                        'email' => $email,
                        'nama_lengkap' => $user['nama_lengkap'],
                        'user_level' => $user['user_level']
                    );
                    */

                    //Jika user adalah customer
                    if ($user['id_role'] == 3) {
                        //Membuat session customer
                        $this->session->set_userdata($user);
                        redirect('', $user);
                    }

                    //Jika user adalah admin
                    if ($user['id_role'] == 1) {
                        //Membuat session admin
                        $this->session->set_userdata($user);

                        //Note: Kalau pakai view, data session ke load, tapi tidak berjalan perintah controller
                        //$this->load->view('admin/dashboard.php');

                        //Note: Kalau pakai redirect, perintah controller jalan, tapi data session tidak ke load
                        redirect('admin', $user);
                    }
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
            //$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau Password salah!</div>');

            //Redirect ke Login
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('');
        }

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

            //Alert akun gagal dibuat
            $this->session->flashdata('message', '<div class="alert-danger" role="alert">Akun tidak berhasil dibuat.</div>');
        } else {

            //Model M_User pada fungsi tambahDataCustomer
            $this->M_User->tambahDataCustomer();

            //Model M_User pada fungsi tambahUserToken(sekaligus dengan fungsi send token ke email)
            $this->M_User->tambahUserToken();

            //Alert akun berhasil dibuat
            $this->session->flashdata('message', ' <div class="alert alert-success" role="alert">Selamat, akun berhasil dibuat! Mohon konfirmasi melalui email!</div>');


            //Redirect ke Login
            redirect('auth');
        }
    }

    public function verify()
    {
        //Pengambilan data dari link controller
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        //Now
        $now = date('Y-m-d H:i:s');


        //Memasukkan email ker array, untuk dibawa ke if pertama(cek email nya benar atau tidak)
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //Pengecekan user(apakah user nya ada, dan email nya benar)
        if ($user) {

            //Pengecekan apakah user nya sudah aktif atau tidak(mencegah adanya dua kali pencet aktivasi)
            if ($user['is_active'] == 'yes') {
                //Alert akun sudah diaktivasi
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda sudah diaktivasi!</div>');

                //Redirect ke Login
                redirect('auth');
            }

            //Memasukkan token ker array, untuk dibawa ke if kedua(cek token nya benar atau tidak)
            $user_token = $this->db->get_where('usertoken', ['token' => $token])->row_array();

            if ($user_token) {


                //Pengecekan waktu token(maksimal 1x24 jam setelah registrasi)
                if ($now - $user_token['time_created'] < (60 * 60 * 24)) {

                    //Memasukkan data user ke array, untuk dibawa ke if ketiga(cek akun nya aktif atau tidak)
                    $user = $this->db->get_where('user', ['email' => $email])->row_array();

                    if ($user['is_active'] == 'not_yet_activated') {

                        //Update user set is_active = yes
                        $this->db->set('is_active', 'yes');
                        $this->db->where('email', $email);
                        $this->db->update('user');

                        //Delete user_token
                        $this->db->delete('usertoken', ['email' => $email]);

                        //Alert akun berhasil diaktivasi
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, akun anda berhasil diaktivasi!</div>');

                        //Redirect ke Login
                        redirect('auth');
                    } else {
                        //Alert akun sudah diaktivasi
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda sudah diaktivasi!</div>');

                        //Redirect ke Login
                        redirect('auth');
                    }
                } else {
                    //Alert token expired
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Anda expired! Mohon hubungi Customer Service.</div>');

                    //Redirect ke Login
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">Aktivasi akun gagal! Token tidak valid.</div>');

                redirect('auth');
            }
        } else {
            //Alert email salah
            $this->session->set_flashdata('message', '<div class="alert 
        alert-danger" role="alert">Aktivasi akun gagal! Email tidak valid.</div>');

            redirect('auth');
        }
    }

    public function forgot()
    {
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('user_level');

        $this->session->sess_destroy();

        //Alert akun berhasil logout
        $this->session->set_flashdata('message', '<div class="alert 
        alert-success" role="alert">Berhasil logout!</div>');

        //Redirect ke Login
        redirect(base_url());
    }
}
