<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class CartDavid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('M_Cart');
        $this->load->model('M_Page');
        $this->load->model('Modelproduk');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
        alert-danger" role="alert">Mohon login untuk dapat mengakses keranjang belanja.</div>');
            redirect('');
        }

        $data['title'] = 'Cart | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$where = array('id_produk' => $id);
        //$data["data"] = $this->Modelproduk->GetProdukById($id);

        $this->session->set_flashdata('message', '<div class="alert 
        alert-danger" role="alert" style="text-align:center;">Untuk dapat melanjutkan checkout, mohon lengkapi data pribadi dan identitas resmi Anda terlebih dahulu.</div>');

        $this->load->view('includes/header.php', $data);
        $this->load->view('cartview.php', $data);
        $this->footer();
    }

    public function footer()
    {
        $data['pages'] = $this->M_Page->getAllRowPages()->result();
        $this->load->view('includes/footer.php', $data);
    }
}
