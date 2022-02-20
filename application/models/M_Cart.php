<?php

class M_Cart extends CI_model
{
    public function getAllCart()
    {
        return $this->db->get('cart')->result_array();
        return $this->db->get('detailcart')->result_array();
    }

    public function tambahDataCart()
    {
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $datacart = [
            'id_user' => '1',
            'jumlah_produk' => htmlspecialchars($this->input->post('jumlah_produk', true)),
            'total_pembayaran' => htmlspecialchars($this->input->post('total_pembayaran', true)),
            'updated_at' => $now
        ];

        $datadetailcart = [
            'id_cart' => htmlspecialchars($this->input->post('id_cart', true)),
            'id_produk' => htmlspecialchars($this->input->post('id_produk', true)),
            'qty_produk' => htmlspecialchars($this->input->post('qty_produk', true)),
            'total_harga_produk' => htmlspecialchars($this->input->post('total_harga_produk', true)),
            'plan_sewa_awal' => htmlspecialchars($this->input->post('plan_sewa_awal', true)),
            'plan_sewa_akhir' => htmlspecialchars($this->input->post('plan_sewa_akhir', true))
        ];

        //Kirim ke tabel cart
        $this->db->insert('cart', $datacart);

        //Kirim ke tabel cart
        $this->db->insert('detailcart', $datadetailcart);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }
}
