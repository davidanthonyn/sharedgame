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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('game-listing.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function detail($id)
    {
        $this->load->database();
        $this->load->model('Modelproduk');
        $this->load->model('Rekening');
        $data['rekening']=$this->Rekening->getAllRekening();
        $where = array('id_produk' => $id);
        $data['tarifsewa'] = $this->Modelproduk->tarif_sewa($where, 'tarifsewa')->result_array();
        $data["data"] = $this->Modelproduk->GetProdukById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('detailproduk.php', $data);
        $this->load->view('includes/footer.php', $data);
        
    }

    function kelolaproduk()
    {
        $this->load->model('Modelproduk');
        $data['title'] = 'Kelola Produk | SharedGame';
        $data['product'] = $this->Modelproduk->getAllRowProducts()->result();
        $this->load->view('admin/manage-products.php', $data);
    }
}
