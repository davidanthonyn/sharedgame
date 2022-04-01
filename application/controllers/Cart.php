<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('M_Cart');
    }

    public function index()
    {
        redirect('cart/tampil_cart');
    }

    public function tampil_cart()
    {
        $data['kategori'] = $this->M_Cart->get_brand_all();
        //$this->load->view('themes/header',$data);
        $this->load->view('v_cart.php', $data);
        //$this->load->view('themes/footer');
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
