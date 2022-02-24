<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        /*if (empty($this->session->userdata('admin'))) {
            redirect('auth');
        }*/
    }

    function index()
    {
        $this->load->database();
        $this->load->model('Modelproduk');
        $data["data"] = $this->Modelproduk->GetProduk();
        $data['title'] = 'Products | SharedGame';
        $this->load->view('game-listing.php', $data);
    }

    function detail($id)
    {
        $this->load->database();
        $this->load->model('Modelproduk');
        $data["data"] = $this->Modelproduk->GetProdukById($id);
        $this->load->view('detailproduk.php', $data);
    }

    function kelolaproduk()
    {
        $this->load->model('Modelproduk');
        $data['title'] = 'Kelola Produk | SharedGame';
        $data['product'] = $this->Modelproduk->getAllRowProducts()->result();
        $this->load->view('admin/manage-products.php', $data);
    }
}
