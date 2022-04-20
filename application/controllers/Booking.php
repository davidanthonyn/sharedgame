<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //Model M_Brand pada fungsi tambahDataCustomer
        $this->load->model('M_Booking');
    }

    public function index()
    {
    }

   
    public function kelola()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
      //      $this->load->model('M_Booking');
            $data['title'] = 'Kelola Booking | SharedGame';
            $data['booking'] = $this->M_Booking->getdetailbooking()->result_array();
            $this->load->view('admin/detail-bookings', $data);
        } else {
            redirect('');
        }

        
    }


    public function manage()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
      //      $this->load->model('M_Booking');
            $data['title'] = 'Kelola Booking | SharedGame';
            $data['booking'] = $this->M_Booking->getbooking()->result_array();
            $this->load->view('admin/bookings', $data);
        } else {
            redirect('');
        }
    }

    function edit_data($id_rekening)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            $this->load->model('M_Rekening');
            $data['title'] = 'Edit Rekening | SharedGame';
            $where = array('id_rekening_toko' => $id_rekening);
            $data['RekeningEdit'] = $this->M_Rekening->edit_record('rekeningtoko', $where)->result();
            $data['status'] = $this->M_Rekening->AllRekening()->result();
            $this->load->view('admin/edit-rekening', $data);
        } else {
            redirect('');
        }
    }

   
    function deletebooking($id_booking)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
        if ($data['user']['id_role'] == '1') {
            $this->load->model('M_Booking');
            $where = array('id_booking' => $id_booking);
            $this->M_Booking->delete_record($where, 'booking');
            redirect('Booking/manage');
        } else {
            redirect('');
        }
    } 

    function deletedetail_booking($id_detail_booking)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
        if ($data['user']['id_role'] == '1') {
            $this->load->model('M_Booking');
            $where = array('id_detail_booking' => $id_detail_booking);
            $this->M_Booking->delete_record($where, 'detailbooking');
            redirect('Booking/kelola');
        } else {
            redirect('');
        }
    }
}