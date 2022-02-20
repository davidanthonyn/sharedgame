<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Brand extends CI_model
{
    public function getAllBrand()
    {
        return $this->db->get('brand')->result_array();
    }

    public function tambahDataBrand()
    {
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data = [
            'nama_brand' => htmlspecialchars($this->input->post('brand', true)),
            //'gambar_brand' => htmlspecialchars($this->input->post('gambar_brand', true)),
            'gambar_brand' => "empty",
            'status_brand' => "aktif",
            'datetime_brand_added' => $now
        ];

        //Kirim ke tabel user
        $this->db->insert('brand', $data);
    }

    public function getBrandById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }
}
