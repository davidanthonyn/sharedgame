<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library('form_validation');
    }

    public function index()
    {
    }

    function profile_settings()
    {
        $this->load->view('profile.php');
    }

    function my_booking()
    {
        $this->load->view('profile.php');
    }

    function post_testimonial()
    {
        $this->load->view('post-testimonial.php');
    }

    function manage_testimonial()
    {
        $this->load->view('my-testimonials.php');
    }

    public function edit()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        }

        $data['title'] = 'Edit Profile | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['id_role'] == '1') {
            //Membuat flashdata bahwa user adalah admin
            $this->session->set_flashdata('datausermessage', '<div class="alert alert-success" role="alert" style="text-align:center;">Anda adalah admin, pergantian data bersifat opsional.</div>');
        } else if ($data['user']['id_role'] == '2') {
            //Membuat flashdata bahwa user adalah karyawan
            $this->session->set_flashdata('datausermessage', '<div class="alert alert-success" role="alert" style="text-align:center;">Anda adalah karyawan, pergantian data bersifat opsional.</div>');
        } else if ($data['user']['id_role'] == '3') {
            //Membuat if ktp customer
            if ($data['user']['status_ktp'] == 'belum') {
                //Membuat flashdata bahwa customer belum ktp
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-danger" role="alert" style="text-align:center;">Mohon mengupload KTP dan selfie KTP anda, agar dapat menyewa produk.</div>');
            } else if ($data['user']['status_ktp'] == 'sedang_verifikasi') {
                //Membuat flashdata bahwa customer ktp nya sedang diverifikasi
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Identitas Anda sedang diverifikasi. Mohon untuk menunggu sejenak.</div>');
            } else if ($data['user']['status_ktp'] == 'diterima') {
                //Membuat flashdata bahwa customer ktp nya diterima
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-success" role="alert" style="text-align:center;">Identitas Anda telah diterima. Silakan melanjutkan transaksi.</div>');
            } else if ($data['user']['status_ktp'] == 'ditolak') {
                //Membuat flashdata bahwa customer ktp nya ditolak
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-danger" role="alert" style="text-align:center;">Identitas Anda ditolak. Mohon untuk mengupload identitas anda kembali. Bila kesulitan, hubungi <a href="http://localhost/sharedgame/Contact">Kami</a>.</div>');
            } else if ($data['user']['status_ktp'] == 'ktp_saja') {
                //Membuat flashdata bahwa customer ktp nya ditolak
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Anda baru mengupload KTP Anda, mohon lengkapi dengan foto selfie KTP.</a></div>');
            } else if ($data['user']['status_ktp'] == 'selfie_ktp_saja') {
                //Membuat flashdata bahwa customer ktp nya ditolak
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Anda baru mengupload selfie KTP Anda, mohon lengkapi dengan foto KTP.</a></div>');
            }
        }

        //$nomorhpketik = $this->input->post('mobilenumber');
        //$nomorhpduaketik = $this->input->post('mobilenumbertwo');





        //Validasi nama
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        //$this->form_validation->set_rules('mobilenumber', 'Mobile Number ', 'required|regex_match[/^[0-9]{15}$/]'); //{15} for 15 digits number
        //$this->form_validation->set_rules('mobilenumbertwo', 'Mobile Number Two ', 'required|regex_match[/^[0-9]{15}$/]'); //{15} for 15 digits number

        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php', $data);
            $this->load->view('profile.php', $data);
            $this->load->view('includes/footer.php', $data);
        } else {
            $nomorhp = $data['user']['no_hp'];
            $nomorhpdua =  $data['user']['no_hp_dua'];


            if ($data['user']['id_role'] == '3') {
                if ($data['user']['alamat_lengkap'] == 'empty' || $data['user']['no_hp'] == 'empty' || $data['user']['no_hp_dua'] == 'empty') {
                    //Membuat flashdata bahwa customer belum ktp
                    $this->session->set_flashdata('otherdata', '<div class="alert alert-danger" role="alert" style="text-align:center;">Mohon melengkapi seluruh data pribadi Anda(Tgl Lahir, Kedua Nomor HP, dan Alamat), agar dapat menyewa produk.</div>');
                    redirect('user/edit');
                }
            }

            if ($data['user']['id_role'] == '3') {
                if ($nomorhp == $nomorhpdua) {
                    //Membuat flashdata bahwa customer belum ktp
                    $this->session->set_flashdata('message_error', 'Nomor HP Utama TIDAK boleh sama dengan Nomor HP Cadangan');
                    redirect('user/edit');
                }
            }

            $this->M_User->editDataUser();

            $this->session->set_flashdata('message', 'Your profile has been updated!');

            //Redirect ke Login
            redirect('user/edit');
        }
    }

    public function processEdit()
    {
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentpassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required|trim|min_length[8]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|trim|min_length[8]|matches[newpassword]');

        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php', $data);
            $this->load->view('update-password.php', $data);
            $this->load->view('includes/footer.php', $data);
        } else {
            $current_password = $this->input->post('currentpassword');
            $new_password = $this->input->post('newpassword');
            $confirm_password = $this->input->post('confirmpassword');

            //Validasi input password lama dengan password sekarang pada database
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message_error', 'Wrong Current Password!');
                redirect('user/changePassword');
            } else {
                //Validasi password baru dan password yang diinput
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message_error', 'New Password cannot be the same as Current Password!');
                    redirect('user/changePassword');
                } else {
                    //Password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', 'Password changed!');
                    redirect('user/changePassword');
                }
            }
        }
    }
}
