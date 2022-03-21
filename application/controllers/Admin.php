<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Brand');
        //$this->load->model('M_Page');
        $this->load->model(array('M_Page'));
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
        //$this->load->database();

        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            //Title Dashboard Admin saat halaman dibuka
            $data['title'] = 'Dashboard Admin | SharedGame';
        } else if ($data['user']['id_role'] == '2') {
            //Title Dashboard Karyawan saat halaman dibuka
            $data['title'] = 'Dashboard Karyawan | SharedGame';
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
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

    function manage_page()
    {
        //$data['about'] = $this->M_Page->tampilkan_about_us()->result();
        //$data['faq'] = $this->M_Page->tampilkan_faq()->result();
        //$data['privacy'] = $this->M_Page->tampilkan_privacy()->result();
        //$data['terms'] = $this->M_Page->tampilkan_terms()->result();

        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '2') {
            //Title Dashboard Admin saat halaman dibuka
            redirect('admin');
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
        }

        $tangkapId = $this->input->post('id_page');
        $tangkapDetail = $this->input->post('detail');

        $this->form_validation->set_rules('detail', 'Detail Page', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kelola Halaman | SharedGame';
            $data['page'] = $this->M_Page->tampilkan_halaman()->result();
            $this->load->view('admin/manage-pages.php', $data);
        } else if ($tangkapId == '-- Pilih Halaman --') {
            $this->session->set_flashdata('messagefailed', 'Pilih halaman yang ingin diubah!');
            redirect('admin/kelolahalamanlain');
        } else {
            $data = array(
                'detail' => $tangkapDetail
            );

            $where = array(
                'id_page' => $tangkapId
            );

            $edit = $this->M_Page->update_record($where, $data, 'pages');

            $this->session->set_flashdata('messagesuccess', 'Halaman berhasil diedit');
            redirect('admin/manage_page');

            /*
            if ($edit == true) {
                $this->session->set_flashdata('messagesuccess', 'Halaman berhasil diedit');
                redirect('admin/manage_page');
            } else {
                $this->session->set_flashdata('messagefailed', 'Halaman gagal diedit');
                redirect('admin/manage_page');
            }*/
        }
    }

    function getPagesByAjax()
    {
        $id_page = $this->input->post('id_page');
        $where = array('id_page' => $id_page);
        //$where = array('id_page' => 1);
        $data = $this->M_Page->get_pages_by_ajax($where);
        echo json_encode($data);
    }
}
