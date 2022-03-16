<?php

class M_User extends CI_model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahDataCustomer()
    {
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $email = $this->input->post('email', true);

        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'alamat_lengkap' => "empty",
            'no_hp' => "empty",
            'no_hp_dua' => "emptysecond",
            'tgl_lahir' => "0000-00-00",
            'foto_ktp' => "emptyktp.png",
            'foto_selfie_ktp' => "emptyselfiektp.png",
            'id_role' => 3,
            'status_ktp' => "belum",
            'is_active' => "not_yet_activated",
            'created_at' => $now,
            'updated_at' => $now
        ];

        //Kirim ke tabel user
        $this->db->insert('user', $data);
    }

    public function editDataUser()
    {
        $name = $this->input->post('fullname');
        $email = $this->input->post('email', true);
        $mobilenumber = $this->input->post('mobilenumber');
        $mobilenumbertwo = $this->input->post('mobilenumbertwo');
        $dob = $this->input->post('dob');
        $address = $this->input->post('address');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekktp = $data['user']['fotoktp'];
        $cekselfiektp = $data['user']['selfie_foto_ktp'];
        $cekstatusktp = $data['user']['status_ktp'];

        //Memvalidasi ktp dan selfie terlebih dahulu, sebelum mengambil file dari POST
        if ($cekktp == 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Cek jika ada gambar yang akan diupload
            $upload_ktp = $_FILES['ktp']['name'];
            $upload_selfie_ktp = $_FILES['selfiektp']['name'];
        } else if ($cekktp == 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
            //Cek jika ada gambar yang akan diupload
            $upload_ktp = $_FILES['ktp']['name'];
        } else if ($cekktp != 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Cek jika ada gambar yang akan diupload
            $upload_selfie_ktp = $_FILES['selfiektp']['name'];
        } else if ($cekktp != 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
        }

        if ($upload_ktp) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '5120';
            $config['upload_path']     = './assets/img/ktp/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ktp')) {
                //Jika upload ktp berhasil
                $new_image_ktp = $this->upload->data('file_name');
                $this->db->set('foto_ktp', $new_image_ktp);
            } else {
                //Jika upload ktp gagal
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Upload KTP anda gagal.</div>');
            }
        }

        if ($upload_selfie_ktp) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '5120';
            $config['upload_path']     = './assets/img/selfiektp/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('selfiektp')) {
                //Jika upload ktp berhasil
                $new_image_selfie_ktp = $this->upload->data('file_name');
                $this->db->set('foto_selfie_ktp', $new_image_selfie_ktp);
            } else {
                //Jika upload ktp gagal
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Upload Selfie KTP anda gagal.</div>');
            }
        }

        //Mengecek kembali, apakah user telah mengupload ktp, serta selfie ktp juga
        if ($cekktp != 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'sedang_verifikasi');
        } else if ($cekktp == 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'selfie_ktp_saja');
        } else if ($cekktp != 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'ktp_saja');
        } else if ($cekktp == 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'belum');
        }

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $this->db->set('nama_lengkap', $name);
        $this->db->set('no_hp', $mobilenumber);
        $this->db->set('no_hp_dua', $mobilenumbertwo);
        $this->db->set('tgl_lahir', $dob);
        $this->db->set('alamat_lengkap', $address);
        $this->db->set('updated_at', $now);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function tambahUserTokenVerify()
    {
        $email = $this->input->post('email', true);

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        //Siapkan token untuk aktivasi akun
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'time_created' => $now
        ];

        //Kirim ke tabel user token
        $this->db->insert('usertoken', $user_token);
        $this->_sendEmail($token, 'verify');
    }

    public function tambahUserTokenForgot()
    {
        $email = $this->input->post('email', true);

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        //Siapkan token untuk aktivasi akun
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'time_created' => $now
        ];

        //Kirim ke tabel user token
        $this->db->insert('usertoken', $user_token);
        $this->_sendEmail($token, 'forgot');
    }

    private function _sendEmail($token, $type)
    {
        $email = $this->input->post('email', true);

        //Config gmail
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'sharedgametech@gmail.com',
            'smtp_pass' => 'sukamaingame',
            'smtp_port' => 465,
            'mail_type' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        /*
        //Config 000WebHost
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ns02.000webhost.com',
            'smtp_user' => 'noreply@sharedgame.tech',
            'smtp_pass' => 'qmSgTyH6',
            'smtp_port' => 587,
            'mail_type' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        */

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('noreply@sharedgame.tech', 'SharedGame | Do Not Reply');

        //$this->email->to('kontolbinatang@protonmail.com');

        $this->email->to($email);

        //Jika tipe nya adalah verifikasi akun
        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun | SharedGame');

            $this->email->message('Klik link berikut untuk memverifikasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Aktivasi Akun</a>');

            //$this->email->message('<html><head></head><body>Klik link berikut untuk memverifikasi akun anda : 
            //<a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . $token . '">Aktivasi Akun</a></body><html>');
        } else if ($type == 'forgot') {
            //Jika tipe nya lupa password
            $this->email->subject('Reset Password | SharedGame');

            $this->email->message('Klik link berikut untuk mereset password Anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
