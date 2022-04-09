<?php

class M_Cart extends CI_model
{
    public function getAllCart()
    {
        return $this->db->get('cart')->result_array();
        return $this->db->get('detailcart')->result_array();
    }

    public function buatRowCart($id_user)
    {
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data = [
            'id_user' => $id_user,
            'updated_at' => $now
        ];

        //Kirim ke tabel cart
        $this->db->insert('cart', $data);
    }

    public function tambahDataDetailCart()
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

    public function get_brand_all()
    {
        $query = $this->db->get('brand');
        return $query->result_array();
    }

    public function get_detail_cart($id_cart)
    {
        $data = $this->db->query("SELECT * FROM detailcart 
        JOIN produk
           ON detailcart.id_produk = produk.id_produk
           JOIN tarifsewa
           ON detailcart.id_tarif_sewa = tarifsewa.id_tarif_sewa 
           JOIN cart ON detailcart.id_cart = cart.id_cart 
           WHERE detailcart.id_cart = " . $id_cart . "
        ORDER BY detailcart.start_plan DESC");

        return $data;
    }

    public function get_row_cart($id_cart)
    {
        $this->db->select('id_cart');
        $this->db->from('detailcart');
        $this->db->where('id_cart', $id_cart);
        return $this->db->count_all_results();
    }

    public function get_total_price_cart($id_cart)
    {
        $data = $this->db->query("SELECT SUM(tarifsewa.tarif_harga) FROM detailcart 
        JOIN produk 
        ON detailcart.id_produk = produk.id_produk 
        JOIN tarifsewa 
        ON detailcart.id_tarif_sewa = tarifsewa.id_tarif_sewa 
        JOIN cart ON detailcart.id_cart = cart.id_cart 
        WHERE detailcart.id_cart = " . $id_cart);

        return $data;
    }

    function delete_record($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    /*
    public function get_product_detail_cart()
    {
        $data = $this->db->query("SELECT *, produk.nama_produk FROM detailcart JOIN produk ON detailcart.id_produk = produk.id_produk");
        return $data;
    }

    public function get_price_detail_cart()
    {
        $data = $this->db->query("SELECT *, tarif_harga, lama_sewa_hari FROM detailcart JOIN tarifsewa ON detailcart.id_tarif_sewa = tarifsewa.id_tarif_sewa");
        return $data;
    }

    public function get_row_detail_cart($id_cart)
    {
        $data = $this->db->query("SELECT * FROM detailcart WHERE id_cart =" . $id_cart);
        return $data;
    }*/

    //coba sql query
    /*
        SELECT * FROM detailcart 
JOIN produk
   ON detailcart.id_produk = produk.id_produk
   JOIN tarifsewa
   ON detailcart.id_tarif_sewa = tarifsewa.id_tarif_sewa 
   JOIN cart ON detailcart.id_cart = cart.id_cart 
   WHERE detailcart.id_cart = 1
ORDER BY detailcart.start_plan DESC*/
}
