<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cart extends CI_Controller
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
        $data['keranjang'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->result();
        $data['detailcart'] = $this->M_Cart->get_all_detail_cart()->result();
       
       
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

    public function check_out()
    {
        $data['kategori'] = $this->M_Cart->get_brand_all();
        $this->load->view('themes/header', $data);
        $this->load->view('shopping/check_out', $data);
        $this->load->view('themes/footer');
    }

    function tambah_keranjang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['cart'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $qty = $this->input->post('myNumber');
        $total = $this->input->post('price');
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        if ($data['cart'] == null) {
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'jumlah_produk' => $qty,
                'total_pembayaran' => $total,
                'updated_at' => $now
                
            ];

            //Kirim ke tabel user
            $this->db->insert('cart', $data);
        } else{
           // UPDATE table SET quantity = quantity + 5 WHERE Item_id = <x>
        }

        $data_produk = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('nama'),
            'price' => $this->input->post('harga'),
            'gambar' => $this->input->post('gambar'),
            'qty' => $this->input->post('qty')
        );
        $this->cart->insert($data_produk);
        redirect('shopping');
    }

    function hapus_keranjang($rowid)
    {
        if ($rowid == "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('shopping/tampil_cart');
    }

    function ubah_keranjang()
    {
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'gambar' => $gambar,
                'amount' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        redirect('shopping/tampil_cart');
    }

    public function proses_order()
    {
        //-------------------------Input data pelanggan--------------------------
        $data_pelanggan = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp')
        );
        $id_pelanggan = $this->M_Cart->tambah_pelanggan($data_pelanggan);
        //-------------------------Input data order------------------------------
        $data_order = array(
            'tanggal' => date('Y-m-d'),
            'pelanggan' => $id_pelanggan
        );
        $id_order = $this->M_Cart->tambah_order($data_order);
        //-------------------------Input data detail order-----------------------
        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = array(
                    'order_id' => $id_order,
                    'produk' => $item['id'],
                    'qty' => $item['qty'],
                    'harga' => $item['price']
                );
                $proses = $this->M_Cart->tambah_detail_order($data_detail);
            }
        }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        $data['kategori'] = $this->M_Cart->get_brand_all();
        $this->load->view('themes/header', $data);
        $this->load->view('shopping/sukses', $data);
        $this->load->view('themes/footer');
    }
}
