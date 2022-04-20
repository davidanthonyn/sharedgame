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

// detailbooking  
    function getdetailbooking()
{   
    $data = $this->db->query("SELECT * FROM detailbooking 
        JOIN booking
           ON detailbooking.id_booking = booking.id_booking
           JOIN produk
           ON detailbooking.id_produk = produk.id_produk
           JOIN user ON booking.id_user = user.id_user
        ORDER BY detailbooking.id_detail_booking ASC");

        return $data;

}

// booking
function getbooking()
{   
    $data = $this->db->query("SELECT * FROM booking 
        JOIN user
           ON booking.id_user = user.id_user
        ORDER BY booking.id_booking ASC");

        return $data;

}

}
