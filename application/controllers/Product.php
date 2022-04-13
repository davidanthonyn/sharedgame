<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Page');
        /*if (empty($this->session->userdata('admin'))) {
            redirect('auth');
        }*/
    }

    function index()
    {
        $this->load->database();
        $this->load->model('Modelproduk');
        $data["produk"] = $this->Modelproduk->GetProduk();
        $data['title'] = 'Products | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['brand'] = $this->db->get('brand')->result_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('game-listing.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    public function filter()
    {
         if ($this->input->post('id_brand')=="0") {
         $produk = $this->db->get('produk')->result_array();
     }
         else
     {
         $id = $this->input->post('id_brand');
         $produk = $this->db->get_where('produk', ['id_brand'=>$id])->result_array();
  

     }

     $data['title'] = 'Products | SharedGame';
     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
     $data['brand'] = $this->db->get('brand')->result_array();

         $data['produk'] = $produk;
         $this->load->view('includes/header.php', $data);
        $this->load->view('game-listing', $data);
    }

    function detail($id)
    {
        $this->load->database();
        $this->load->model('Modelproduk');
        $this->load->model('M_Rekening');
        $data['rekening'] = $this->M_Rekening->getAllRekening();
        $where = array('id_produk' => $id);
        $data['tarifsewa'] = $this->Modelproduk->tarif_sewa($where, 'tarifsewa')->result_array();
        $data["data"] = $this->Modelproduk->GetProdukById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('detailproduk.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    public function footer()
    {
        $data['pages'] = $this->M_Page->getAllRowPages()->result();
        $this->load->view('includes/footer.php', $data);
    }
}
