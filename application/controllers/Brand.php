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

    public function kelola()
    {
        $data['title'] = 'Kelola Brand | SharedGame';
        $data['brand'] = $this->M_Brand->getAllBrand()->result();
        $this->load->view('admin/manage-brands', $data);
    }

    function edit_data($id_brand)
    {
        $data['title'] = 'Edit Brand | SharedGame';
        $where = array('id_brand' => $id_brand);
        $data['brandEdit'] = $this->M_Brand->edit_record('brand', $where)->result();
        $data['status'] = $this->M_Brand->getAllBrand()->result();
        $this->load->view('admin/edit-brand', $data);
    }

    function proses_edit_data()
    {
        $tangkapIdBrand = $this->input->post('id_brand');
        $tangkapNamaBrand = $this->input->post('nama_brand');
        $tangkapStatusBrand = $this->input->post('gambar_brand');

        $data = array(
            'nama_brand' => $tangkapNamaBrand,
            'status' => $tangkapStatusBrand
        );

        $where = array(
            'id_brand' => $tangkapIdBrand
        );

        $this->M_Brand->update_record($where, $data, 'dosen');
        redirect('Brand/kelola');
    }

    function delete_data($id_brand)
    {
        $where = array('id_brand' => $id_brand);
        $this->M_Brand->delete_record($where, 'brand');
        redirect('Brand/kelola');
    }
}
