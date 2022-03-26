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
        redirect('user/edit');
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
        $data['identity'] = $this->db->get_where('usercard', ['id_user' => $this->session->userdata('id_user')])->row_array();

        /*
        if ($data['user']['id_role'] == '1') {
            //Membuat flashdata bahwa user adalah admin
            $this->session->set_flashdata('datausermessage', '<div class="alert alert-success" role="alert" style="text-align:center;">Anda adalah admin, pergantian data bersifat opsional.</div>');
        } else if ($data['user']['id_role'] == '2') {
            //Membuat flashdata bahwa user adalah karyawan
            $this->session->set_flashdata('datausermessage', '<div class="alert alert-success" role="alert" style="text-align:center;">Anda adalah karyawan, pergantian data bersifat opsional.</div>');
        } else if ($data['user']['id_role'] == '3') {
            //Cek identitas
            if (!$data['identity']) {
            }
        }

        if ($data['user']['id_role'] == '3') {
            if ($data['user']['alamat_lengkap'] == 'empty' || $data['user']['no_hp'] == 'empty' || $data['user']['no_hp_dua'] == 'empty') {
                //Membuat flashdata bahwa customer belum ktp
                $this->session->set_flashdata('otherdata', '<div class="alert alert-danger" role="alert" style="text-align:center;">Mohon melengkapi seluruh data pribadi Anda(Tgl Lahir, Kedua Nomor HP, dan Alamat), agar dapat menyewa produk.</div>');
            }
        }
        */

        //Validasi nama
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('mobilenumber', 'Mobile Number ', 'required|min_length[12]|max_length[15]'); //{15} for 15 digits number
        $this->form_validation->set_rules('mobilenumbertwo', 'Mobile Number Two ', 'required|min_length[12]|max_length[15]'); //{15} for 15 digits number
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php', $data);
            $this->load->view('profile.php', $data);
            $this->load->view('includes/footer.php', $data);
        } else {
            $name = $this->input->post('fullname');
            $email = $this->input->post('email', true);
            $mobilenumber = $this->input->post('mobilenumber');
            $mobilenumbertwo = $this->input->post('mobilenumbertwo');
            $dob = $this->input->post('dob');
            $address = $this->input->post('address');

            $this->db->set('nama_lengkap', $name);
            $this->db->set('email', $email);
            $this->db->set('no_hp', $mobilenumber);
            $this->db->set('no_hp_dua', $mobilenumbertwo);
            $this->db->set('tgl_lahir', $dob);
            $this->db->set('alamat_lengkap', $address);

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', 'Your profile has been updated!');

            //Redirect ke Login
            redirect('user/edit');
        }
    }


    public function identity()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        }

        $data['title'] = 'Identitas | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['identity'] = $this->db->get_where('usercard', ['id_user' => $this->session->userdata('id_user')])->row_array();

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        if ($data['identity'] == null) {
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'foto_ktp' => "",
                'foto_selfie_ktp' => "",
                'status_ktp' => "belum",
                'note_user' => ""
            ];

            //Kirim ke tabel user
            $this->db->insert('usercard', $data);
        }

        /*
        if ($data['identity']['foto_ktp'] == "" || $data['identity']['foto_selfie_ktp'] == "") {
            //Jika upload ktp gagal
            $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Mohon mengupload ktp dan selfie ktp, untuk melanjutkan transaksi.</div>');
        }*/

        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php', $data);
            $this->load->view('ktp.php', $data);
            $this->load->view('includes/footer.php', $data);
        } else {
            //Cek jika ada ktp dan/atau selfie ktp yang diupload
            $upload_ktp = $_FILES['image']['ktp'];
            $upload_selfie_ktp = $_FILES['image']['selfiektp'];

            //Jika user upload ktp
            if ($upload_ktp) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5120';
                $config['upload_path']     = './assets/img/ktp/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ktp')) {
                    //Jika upload ktp berhasil
                    $new_image_ktp = $this->upload->data('file_name');
                    $this->db->set('foto_ktp', $new_image_ktp);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('usercard');

                    $this->session->set_flashdata('datausermessage', '<div class="alert alert-success" role="alert" style="text-align:center;">KTP berhasil diupload!</div>');
                    redirect('user/identity');
                } else {
                    //Jika upload ktp gagal
                    $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Upload KTP anda gagal.</div>');
                }
            }

            //If user upload selfie ktp
            if ($upload_selfie_ktp) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5120';
                $config['upload_path']     = './assets/img/selfiektp/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('selfiektp')) {
                    //Jika upload ktp berhasil
                    $new_image_selfie_ktp = $this->upload->data('file_name');
                    $this->db->set('foto_selfie_ktp', $new_image_selfie_ktp);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('usercard');

                    $this->session->set_flashdata('datausermessage', '<div class="alert alert-success" role="alert" style="text-align:center;">Selfie KTP berhasil diupload!</div>');
                    redirect('user/identity');
                } else {
                    //Jika upload ktp gagal
                    $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Upload Selfie KTP anda gagal.</div>');
                }
            }
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        }

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
