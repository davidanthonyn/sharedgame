<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Product');
        if (empty($this->session->userdata('admin'))) {
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->database();
        $this->load->model('Modelproduk');
        $data["data"] = $this->Modelproduk->GetProduk();
        $this->load->view('car-listing.php', $data);
    }

    function detail($id)
    {
        $this->load->database();
        $this->load->model('Modelproduk');
        $data["data"] = $this->Modelproduk->GetProdukById($id);
        $this->load->view('detailproduk.php', $data);
    }
}
