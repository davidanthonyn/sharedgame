<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->library('form_validation');
        /*
        if (empty($this->session->userdata('admin'))) {
            redirect('auth');
        }*/
    }

    function index()
    {
        //Load database
        $this->load->database();

        //Title Dashboard Admin saat halaman dibuka
        $data['title'] = 'Dashboard Admin | SharedGame';

        //Menghitung row customer melalui model M_Admin
        $data['jumlahcustomer'] = $this->M_Admin->getRowCustomer();

        //Menghitung row brand melalui model M_Admin
        $data['jumlahbrand'] = $this->M_Admin->getRowBrand();

        //Menghitung row produk melalui model M_Admin
        $data['jumlahproduct'] = $this->M_Admin->getRowProduct();

        //Menghitung row booking melalui model M_Admin
        $data['jumlahbooking'] = $this->M_Admin->getRowBooking();

        //Menghitung row subscriber aktif melalui model M_Admin
        $data['jumlahsubs'] = $this->M_Admin->getRowSubs();

        //Menghitung row customer service melalui model M_Admin
        $data['jumlahcustomerservice'] = $this->M_Admin->getRowCustomerService();


        $this->load->view('admin/dashboard.php', $data);
    }
}
