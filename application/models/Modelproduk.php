<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelproduk extends CI_Model
{
    public function GetProduk()
    {
        $data = $this->db->query("SELECT *, tarifsewa.tarif_harga FROM produk INNER JOIN tarifsewa ON produk.id_produk = tarifsewa.id_produk WHERE tarifsewa.lama_sewa_hari = '7'");
        return $data->result_array();
    }

    public function FindProduk($nama_produk)
    {
        $data = $this->db->query("SELECT * FROM produk WHERE nama_produk LIKE '%" . $nama_produk . "%' OR kategori_produk LIKE '%" . $nama_produk . "%' OR deskripsi_produk LIKE '%" . $nama_produk . "%'");
        return $data->result_array();
    }

    public function GetProdukById($id)
    {
        $data = $this->db->query("SELECT * FROM produk WHERE id_produk = '$id'");
        return $data->result_array();
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

    public function getAllRowProducts()
    {
        $query = $this->db->query('SELECT * FROM produk JOIN brand ON brand.id_brand = produk.id_brand');
        return $query;
    }

    public function getPriceDay()
    {
        $query = $this->db->query('SELECT * FROM produk JOIN tarifsewa ON tarifsewa.id_produk = produk.id_produk WHERE lama_sewa_hari = 1');
        return $query;
    }

    public function getPrice3Days()
    {
        $query = $this->db->query('SELECT * FROM produk JOIN tarifsewa ON tarifsewa.id_produk = produk.id_produk WHERE lama_sewa_hari = 3');
        return $query;
    }

    public function getPrice7Days()
    {
        $query = $this->db->query('SELECT * FROM produk JOIN tarifsewa ON tarifsewa.id_produk = produk.id_produk WHERE lama_sewa_hari = 7');
        return $query;
    }

    function tarif_sewa($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function edit_record($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    /*
    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }*/


    //NOTE: Bekas M_Product, dipindahkan ke Modelproduk, biar ga bingung. Dimatiin dulu, biar gak nge-override.
    /*
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
    }*/

    function insert_record($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function update_record($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
