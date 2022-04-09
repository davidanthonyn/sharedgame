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
        $data["data"] = $this->Modelproduk->GetProduk();
        $data['title'] = 'Products | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('game-listing.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
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

    function addProductToCart($id)
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat menambahkan produk ke keranjang belanja.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $data['keranjang'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->result();

        if ($data['keranjang'] == NULL) {
            $this->M_Cart->buatRowCart($data['user']['id_user']);
        }

        $data["data"] = $this->Modelproduk->GetProdukById($id);

        $data['cart'] = $this->M_Cart->MoveProductToCart($id);


        $where = array('id_produk' => $id);
        $this->load->view('includes/header.php', $data);
        $this->load->view('detailproduk.php', $data);
        $this->footer();
    }

    public function footer()
    {
        $data['pages'] = $this->M_Page->getAllRowPages()->result();
        $this->load->view('includes/footer.php', $data);
    }
}
