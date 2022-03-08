<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_model
{
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }


    public function tambahDataProduk()
    {
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data = [
            'id_brand' => '1',
            'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
            'kategori_produk' => htmlspecialchars($this->input->post('kategori_produk', true)),
            'warna_produk' => htmlspecialchars($this->input->post('warna_produk', true)),
            'gambar_produk' => htmlspecialchars($this->input->post('gambar_produk', true)),
            'deskripsi_produk' => htmlspecialchars($this->input->post('deskripsi_produk', true)),
            'serial_produk' => htmlspecialchars($this->input->post('serial_produk', true)),
            'jumlah_tersedia' => htmlspecialchars($this->input->post('jumlah_tersedia', true))
        ];

        //Kirim ke tabel user
        $this->db->insert('user', $data);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }
}
