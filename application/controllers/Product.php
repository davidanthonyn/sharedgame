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
        $this->load->model('M_Rekening');
        $data['rekening'] = $this->M_Rekening->getAllRekening();
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
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            $this->load->model('Modelproduk');
            $data['title'] = 'Kelola Produk | SharedGame';
            $data['product'] = $this->Modelproduk->getAllRowProducts()->result();
            $this->load->view('admin/manage-products.php', $data);
        } else {
            redirect('');
        }
    }

    //contoh
    /*
    function getBrandByAjax()
    {
        $brand = $this->input->post('brand');
        $where = array('brand' => $brand);
        $data = $this->M_Brand->get_dosen_by_ajax($where);
        echo json_encode($data);
    }*/

    function tambahproduk()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $this->form_validation->set_rules('brand', 'text', 'trim|required', [
            'required' => 'Brand harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Product | SharedGame';
            $data['icon'] = '<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameSettings.png">';

            $this->load->view('admin/post-aproduct.php', $data);
        } else {
        }
    }
}
