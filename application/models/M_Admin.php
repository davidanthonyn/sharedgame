<?php

class M_Admin extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }

    //Fungsi Menghitung Row Customer
    public function getRowCustomer()
    {
        $this->db->select('customer');
        $this->db->from('user');
        $this->db->where('id_role', 3);
        return $this->db->count_all_results();
    }

    //Fungsi Menghitung Row Produk
    public function getRowProduct()
    {
        return $this->db->count_all('produk');
    }

    //Fungsi Menghitung Row Booking
    public function getRowBooking()
    {
        return $this->db->count_all('booking');
    }

    //Fungsi Menghitung Row Detail Booking
    public function getRowDetailBooking()
    {
        return $this->db->count_all('detailbooking');
    }

    //Fungsi Menghitung Row Brand
    public function getRowBrand()
    {
        return $this->db->count_all('brand');
    }

    //Fungsi Menghitung Row Subscriber
    public function getRowSubs()
    {
        //return $this->db->count_all('detailbooking');

        $this->db->select('subscriber');
        $this->db->from('detailbooking');
        $this->db->where('id_produk', '1');
        $this->db->where('tgl_jam_akhir_sewa', '1');
        return $this->db->count_all_results();
    }

    //Fungsi Menghitung Row Customer Service Query
    public function getRowCustomerService()
    {
        //Minus 1, karena salah satu row adalah informasi kontak CS Perusahaan
        return $this->db->count_all('customerservice') - 1;
    }
}
