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
            redirect('auth');
        }

        $data['title'] = 'Cart | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['keranjangrow'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->row_array();


        //$data['jumlahrow'] = $this->M_Cart->get_row_detail_cart($data['keranjangrow']['id_cart'])->row_array();

        //$where = array('id_produk' => $id);
        //$data['keranjang'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->result();
        //$data['tarifsewa'] = $this->Modelproduk->tarif_sewa($where, 'tarifsewa')->result_array();
        //$data['productname'] = $this->M_Cart->get_product_detail_cart()->result();
        //$data['productprice'] = $this->M_Cart->get_price_detail_cart()->result();

        if ($data['keranjangrow'] == NULL) {
            $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            //Buat array untuk cart
            $data = [
                'id_user' => $data['user']['id_user'],
                'updated_at' => $now
            ];

            //Kirim ke tabel cart
            $this->db->insert('cart', $data);

            $data['detailkeranjangrow'] = $this->db->get_where('detailcart', ['id_cart' => $data['keranjangrow']['id_cart']])->row_array();
            $data['productcart'] = $this->M_Cart->get_detail_cart($data['keranjangrow']['id_cart'])->result();
            $data['totalitem'] = $this->M_Cart->get_row_cart($data['keranjangrow']['id_cart']);
            $data['pricechange'] = $this->M_Cart->get_tarif_sewa($data['keranjangrow']['id_cart'])->result();
            $data['totalprice'] = $this->M_Cart->get_total_price_cart($data['keranjangrow']['id_cart'])->row_array();
        } else if ($data['keranjangrow'] != NULL) {
            $data['detailkeranjangrow'] = $this->db->get_where('detailcart', ['id_cart' => $data['keranjangrow']['id_cart']])->row_array();
            $data['productcart'] = $this->M_Cart->get_detail_cart($data['keranjangrow']['id_cart'])->result();
            $data['totalitem'] = $this->M_Cart->get_row_cart($data['keranjangrow']['id_cart']);
            $data['pricechange'] = $this->M_Cart->get_tarif_sewa($data['keranjangrow']['id_cart'])->result();
            $data['totalprice'] = $this->M_Cart->get_total_price_cart($data['keranjangrow']['id_cart'])->row_array();
        }


        //$where = array('id_produk' => $id);
        //$data["data"] = $this->Modelproduk->GetProdukById($id);
        /*
        $this->session->set_flashdata('message', '<div class="alert 
        alert-danger" role="alert" style="text-align:center;">Untuk dapat melanjutkan checkout, mohon lengkapi data pribadi dan identitas resmi Anda terlebih dahulu.</div>');
*/
        $this->load->view('includes/header.php', $data);
        $this->load->view('cartview.php', $data);
        $this->footer();
    }

    public function delete_cart($id_detail_cart)
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
        alert-danger" role="alert">Mohon login untuk dapat menghapus keranjang belanja.</div>');
            redirect('auth');
        }

        $where = array('id_detail_cart' => $id_detail_cart);
        $this->M_Cart->delete_record($where, 'detailcart');

        redirect('cart');
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
        } else {
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
        $cart_info = $this->input->post('id_detail_cart');
        $qty = $this->input->post('qty_produk');
        $data = array(
            'qty_produk' => $qty
        );

        $where = array('id_detail_cart' => $cart_info);

        $this->db->set('qty_produk', $data);
        $this->db->where('id_detail_cart', $where);
        $this->db->update('detailcart');
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

    public function edit_quantity()
    {
        $rowid = $_POST['rowid'];
        $qty = $_POST['qty'];

        $edit_temp_purchase = array(
            'qty_produk' => $qty
        );

        $this->db->update('detailcart', $edit_temp_purchase, ['id_produk' => $rowid]);
    }

    public function getPriceByAjax()
    {
        $lama = $this->input->post('sewa');
        $produk = $this->input->post('id_produk');
        $where = array('lama_sewa_hari' => $lama, 'id_produk' => $produk);
        //$where = array('id_page' => 1);
        $data = $this->M_Cart->get_price_by_ajax($where);
        echo json_encode($data);
    }

    public function checkout($id_cart)
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
        alert-danger" role="alert">Mohon login untuk dapat mengakses keranjang belanja.</div>');
            redirect('auth');
        }

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ktp'] = $this->db->get_where('usercard', ['id_user' => $data['user']['id_user']])->row_array();
        $data['keranjangrow'] = $this->db->get_where('cart', ['id_cart' => $id_cart])->row_array();
        $data['detailkeranjangrow'] = $this->db->get_where('detailcart', ['id_cart' => $data['keranjangrow']['id_cart']])->row_array();
        $data['productcart'] = $this->M_Cart->get_detail_cart($data['keranjangrow']['id_cart'])->result();
        $data['totalitem'] = $this->M_Cart->get_row_cart($data['keranjangrow']['id_cart']);
        $data['pricechange'] = $this->M_Cart->get_tarif_sewa($data['keranjangrow']['id_cart'])->result();
        $data['totalprice'] = $this->M_Cart->get_total_price_cart($data['keranjangrow']['id_cart'])->row_array();

        if ($data['detailkeranjangrow'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert" style="text-align:center;">Anda belum menambahkan produk ke keranjang!</div>');
            redirect('cart');
        } else if (
            $data['user']['alamat_lengkap'] == "" || $data['user']['no_hp'] == "" || $data['user']['no_hp_dua'] == ""
            || $data['user']['tgl_lahir'] == "0000-00-00"
        ) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert" style="text-align:center;">Mohon <a href="user/edit"> lengkapi </a> data pribadi anda terlebih dahulu</div>');
            redirect('cart');
        } else if ($data['ktp']['foto_ktp'] == NULL || $data['ktp']['foto_selfie_ktp'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert" style="text-align:center;">Mohon <a href="user/identity">mengisi</a> identitas resmi(KTP) anda terlebih dahulu</div>');
            redirect('cart');
        } else if ($data['ktp']['status_ktp'] == "belum") {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert" style="text-align:center;">Anda belum dinyatakan <a href="user/identity">mengisi</a> identitas resmi(KTP)</div>');
            redirect('cart');
        } else if ($data['ktp']['status_ktp'] == "sedang_verifikasi") {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-warning" role="alert" style="text-align:center;">Mohon menunggu verifikasi identitas resmi Anda oleh tim kami, untuk bisa melanjutkan Checkout.</div>');
            redirect('cart');
        } else if ($data['ktp']['status_ktp'] == "ditolak") {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert" style="text-align:center;">Mohon maaf, namun identitas anda ditolak, mohon <a href="user/identity">periksa</a>  kembali.</div>');
            redirect('cart');
        } else if ($data['ktp']['status_ktp'] == "diterima") {
            echo "berhasil";
            //redirect('checkout');
        }
    }
}
