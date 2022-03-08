<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_CustomerService extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $query = $this->db->query('SELECT * FROM customerservice WHERE id_cs = 1');
        return $query;
    }

    function tambahDataKeluhanCS()
    {
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('fullname', true)),
            'email_cs' => htmlspecialchars($this->input->post('emailaddress', true)),
            'number_cs' => htmlspecialchars($this->input->post('phonenumber', true)),
            'pesan_cs' => htmlspecialchars($this->input->post('message', true)),
            'created_at' => $now,
            'status' => 'pending'
        ];

        //Kirim ke tabel user
        $this->db->insert('customerservice', $data);
    }
}
