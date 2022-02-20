<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Brand');
        $this->load->library('form_validation');
    }

    public function index()
    {
    }

    public function tambah()
    {
        $this->form_validation->set_rules('brand', 'text', 'trim|required', [
            'required' => 'Brand harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Brand | SharedGame';
            $this->load->view('admin/create-brand', $data);
        } else {
            //Model M_Brand pada fungsi tambahDataCustomer
            $this->M_Brand->tambahDataBrand();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            //Redirect ke Login
            redirect('Brand/tambah');
        }
    }
}
