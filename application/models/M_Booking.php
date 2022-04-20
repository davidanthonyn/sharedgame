<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Booking extends CI_model
{

    public function AllBooking()
    {
        return $this->db->get('booking');
    }


    function edit_record($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function update_record($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_record($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function DetailBooking()
    {
        return $this->db->get('detailbooking');
    }






























    public function getAllDistributionTakeAway()
    {
        $query = $this->db->query("SELECT nama_lengkap, number_cs FROM customerservice WHERE id_cs = 1");
        return $query;
    }

    public function getAllDistributionSend($id_user)
    {
        $query = $this->db->query("SELECT alamat_lengkap, no_hp, no_hp_dua FROM user WHERE id_user = " . $id_user);
        return $query;
    }

    public function getAllTransactionData()
    {
        $query = $this->db->query("SELECT nama_produk as nama, SUM(harga_final) as amount FROM detailtransaksi JOIN produk ON detailtransaksi.id_produk = produk.id_produk GROUP BY produk.id_produk");
        return $query;
    }
}
