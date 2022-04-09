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
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id])->row_array();

        $tangkapQty = $this->input->post('myNumber');
        //$tangkapJangkaWaktu = $this->input->post('time');
        $tangkapJangkaWaktu = $_POST['time'];
        $tangkapHarga = $_POST['price'];

        if ($tangkapJangkaWaktu == '0') {

            redirect('product/detail/' . $id);
        }

        $data['hargasewa'] = $this->db->get_where('tarifsewa', ['id_produk' => $id, 'lama_sewa_hari' => $tangkapJangkaWaktu, 'tarif_harga' => $tangkapHarga])->row_array();

        if ($data['keranjang'] == NULL) {
            //Set waktu untuk created at dan updated at
            $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');

            $data = [
                'id_user' => $data['user']['id_user'],
                'updated_at' => $now
            ];

            //Kirim ke tabel cart
            $this->db->insert('cart', $data);

            //Mengambil insert id, untuk taruh data di tabel tarifsewa
            $insertId = $this->db->insert_id();

            $dataprodukmasuk = array(
                'id_cart' => $insertId,
                'id_produk' => $id,
                'id_tarif_sewa' => $id_tarif_sewa,
                'qty_produk' => $qty_produk,
                'start_plan' => $start_plan,
                'finish_plan' => $finish_plan
            );
        } else {
        }


        $data["data"] = $this->Modelproduk->GetProdukById($id);

        $dataprodukmasuk = array(
            'id_cart' => $insertId,
            'id_produk' => $id,
            'id_tarif_sewa' => $id_tarif_sewa,
            'qty_produk' => $qty_produk,
            'start_plan' => $start_plan,
            'finish_plan' => $finish_plan
        );

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
