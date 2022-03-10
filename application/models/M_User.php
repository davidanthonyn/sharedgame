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
            'no_hp_dua' => "empty",
            'tgl_lahir' => "0000-00-00",
            'foto_ktp' => "empty",
            'foto_selfie_ktp' => "empty",
            'id_role' => 3,
            'status_ktp' => "belum",
            'is_active' => "not_yet_activated",
            'created_at' => $now,
            'updated_at' => $now
        ];

        //Kirim ke tabel user
        $this->db->insert('user', $data);
    }

    public function tambahUserToken()
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

            $this->email->message('<html><head></head><body>Klik link berikut untuk memverifikasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . $token . '">Aktivasi Akun</a></body><html>');
        }

        //Jika tipe nya adalah lupa password
        if ($type == 'forgot') {
        }



        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
