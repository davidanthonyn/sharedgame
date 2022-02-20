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
    }
}
