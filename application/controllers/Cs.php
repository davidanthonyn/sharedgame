<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cs extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //Model M_Brand pada fungsi tambahDataCustomer
        $this->load->model('M_CustomerService');
    }

    function edit_data($id_cs)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1' || $data['user']['id_role'] == '2') {
            //$this->load->model('M_Rekening');
            $data['title'] = 'Customer Service | SharedGame';
            $where = array('id_cs' => $id_cs);
            $data['CSEdit'] = $this->M_CustomerService->edit_record('customerservice', $where)->result();
            //$data['status'] = $this->M_Rekening->AllRekening()->result();
            $this->load->view('admin/reply-cs', $data);
        } else {
            redirect('');
        }
    }

    function delete_data($id_cs)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1' || $data['user']['id_role'] == '2') {
            //$this->load->model('M_Rekening');
            $data = array(
                'status' => 'ignored'
            );
            $where = array('id_cs' => $id_cs);
            $this->M_CustomerService->update_record($where, $data, 'customerservice');
            redirect('admin/managecs');
        } else {
            redirect('');
        }
    }
}
