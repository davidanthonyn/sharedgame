<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Brand');
        $this->load->library('form_validation');
        $this->load->library('session');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['id_role'] != '1' && $data['user']['id_role'] != '2') {
            redirect('');
        }
    }

    function index()
    {
        //Load database
        $this->load->database();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        if ($data['user']['id_role'] == '1') {
            //Title Dashboard Admin saat halaman dibuka
            $data['title'] = 'Dashboard Admin | SharedGame';
        } else if ($data['user']['id_role'] == '2') {
            //Title Dashboard Karyawan saat halaman dibuka
            $data['title'] = 'Dashboard Karyawan | SharedGame';
        }

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
