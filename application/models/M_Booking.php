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

    public function getAllDistribution()
    {
        $query = $this->db->query("SELECT * FROM rekeningtoko WHERE status_rekening_toko = 'aktif'");
        return $query;
    }
}
