<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelproduk extends CI_Model
{
    public function GetProduk()
    {
        $data = $this->db->query("SELECT * FROM produk");
        return $data->result_array();
    }

    public function GetProdukById($id)
    {
        $data = $this->db->query("SELECT * FROM produk WHERE id_produk = '$id'");
        return $data->result_array();
    }
}
