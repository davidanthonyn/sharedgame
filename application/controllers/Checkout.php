<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Page');
        $this->load->model('M_Rekening');
        $this->load->model('M_Booking');
        $this->load->model('M_Cart');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat checkout.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();

        if ($data['checkout'] == null) {
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'shipping' => NULL,
                'id_rekening_toko' => NULL,
                'updated_at' => $now
            ];

            //Kirim ke tabel user
            $this->db->insert('checkout', $data);
            redirect('checkout/shipping');
        }

        if ($data['checkout']['shipping'] == NULL) {
            redirect('checkout/shipping');
        } else if ($data['checkout']['id_rekening_toko'] == NULL) {
            redirect('checkout/bayar');
        } else if ($data['checkout']['shipping'] != NULL && $data['checkout']['id_rekening_toko'] != NULL) {
            redirect('checkout/review');
        }
    }

    public function proses_checkout()
    {
        $this->load->view('v_chekout');
    }

    public function berhasil()
    {
        $data['title'] = 'Transaksi Berhasil | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('Sukses', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    public function footer()
    {
        $data['pages'] = $this->M_Page->getAllRowPages()->result();
        $this->load->view('includes/footer.php', $data);
    }

    public function bayar()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat menentukan pembayaran pada checkout.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();
        if ($data['checkout']['shipping'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon tentukan distribusi terlebih dahulu.</div>');
            redirect('checkout/shipping');
        }

        $data['title'] = 'Pilih Pembayaran | SharedGame';
        $data['rekening'] = $this->M_Rekening->getAllRekening()->result();

        $this->load->view('checkoutrekening.php', $data);
    }

    public function pilihbayar()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat menentukan pembayaran pada checkout.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $rekening = $this->input->post('rekening');

        if ($rekening == "pilih") {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon tentukan metode transfer bank yang Anda inginkan.</div>');
            redirect('checkout/bayar');
        } else {
            if ($data['checkout']['id_rekening_toko'] == NULL) {

                $this->db->set('id_rekening_toko', $rekening);
                $this->db->set('updated_at', $now);
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('checkout');

                redirect('checkout/review');
            } else {
                $this->db->set('id_rekening_toko', $rekening);
                $this->db->set('updated_at', $now);
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('checkout');

                redirect('checkout/review');
            }
        }
    }

    public function shipping()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat mengakses checkout.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();

        if ($data['checkout'] == null) {
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'shipping' => NULL,
                'id_rekening_toko' => NULL,
                'updated_at' => $now
            ];

            //Kirim ke tabel user
            $this->db->insert('checkout', $data);
        }

        $data['title'] = 'Pilih Pengiriman | SharedGame';
        $data['bookingambil'] = $this->M_Booking->getAllDistributionTakeAway()->row_array();
        $data['bookingantar'] = $this->M_Booking->getAllDistributionSend($this->session->userdata('id_user'))->row_array();

        $this->load->view('checkoutshipping.php', $data);
    }

    public function pilihshipping()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat mengakses checkout.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $distribusi = $this->input->post('distribusi');
        if ($distribusi == "pilih") {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon tentukan penerimaan produk yang Anda pesan.</div>');
            redirect('checkout/shipping');
        } else if ($distribusi == "diambil") {
            if ($data['checkout']['shipping'] == NULL) {

                $this->db->set('shipping', 1);
                $this->db->set('updated_at', $now);
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('checkout');
            } else {
                $this->db->set('shipping', 1);
                $this->db->set('updated_at', $now);
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('checkout');
            }

            redirect('checkout/bayar');
        } else if ($distribusi == "dikirim") {
            if ($data['checkout']['shipping'] == NULL) {
                $this->db->set('shipping', 2);
                $this->db->set('updated_at', $now);
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('checkout');
            } else {
                $this->db->set('shipping', 2);
                $this->db->set('updated_at', $now);
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('checkout');
            }
            redirect('checkout/bayar');
        }
    }

    public function payment()
    {
    }

    public function review()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat mengakses checkout.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();


        if ($data['checkout']['shipping'] == NULL && $data['checkout']['id_rekening_toko'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Anda belum menentukan distribusi dan pembayaran! Mohon tentukan terlebih dahulu!</div>');
            redirect('checkout/shipping');
        } else if ($data['checkout']['shipping'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon tentukan distribusi terlebih dahulu.</div>');
            redirect('checkout/shipping');
        } else if ($data['checkout']['id_rekening_toko'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon tentukan bank transfer terlebih dahulu.</div>');
            redirect('checkout/bayar');
        }

        if ($data['checkout']['shipping'] == 1) {
            $data['bookingambil'] = $this->M_Booking->getAllDistributionTakeAway()->row_array();
            $data['bookingantar'] = NULL;
        } else if ($data['checkout']['shipping'] == 2) {
            $data['bookingantar'] = $this->M_Booking->getAllDistributionSend($this->session->userdata('id_user'))->row_array();
            $data['bookingambil'] = NULL;
        }

        $data['rekening'] = $this->db->get_where('rekeningtoko', ['id_rekening_toko' => $data['checkout']['id_rekening_toko']])->row_array();
        $data['title'] = 'Review Pesanan | SharedGame';
        $data['keranjangrow'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['detailkeranjangrow'] = $this->db->get_where('detailcart', ['id_cart' => $data['keranjangrow']['id_cart']])->row_array();
        $data['productcart'] = $this->M_Cart->get_detail_cart($data['keranjangrow']['id_cart'])->result();
        $data['totalitem'] = $this->M_Cart->get_row_cart($data['keranjangrow']['id_cart']);
        $data['pricechange'] = $this->M_Cart->get_tarif_sewa($data['keranjangrow']['id_cart'])->result();
        $data['totalprice'] = $this->M_Cart->get_total_price_cart($data['keranjangrow']['id_cart'])->row_array();

        $data['tarifsewa'] = $this->M_Cart->get_tarif_sewa($data['detailkeranjangrow']['id_cart'])->result();
        $this->load->view('checkoutreview.php', $data);
    }

    public function success()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();

        if ($data['checkout']['shipping'] == 1) {
            $data['bookingambil'] = $this->M_Booking->getAllDistributionTakeAway()->row_array();
            $data['bookingantar'] = NULL;
        } else if ($data['checkout']['shipping'] == 2) {
            $data['bookingantar'] = $this->M_Booking->getAllDistributionSend($this->session->userdata('id_user'))->row_array();
            $data['bookingambil'] = NULL;
        }

        $data['rekening'] = $this->db->get_where('rekeningtoko', ['id_rekening_toko' => $data['checkout']['id_rekening_toko']])->row_array();
        $data['title'] = 'Review Pesanan | SharedGame';
        $data['keranjangrow'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['detailkeranjangrow'] = $this->db->get_where('detailcart', ['id_cart' => $data['keranjangrow']['id_cart']])->result();

        $data['productcart'] = $this->M_Cart->get_detail_cart($data['keranjangrow']['id_cart'])->result();
        $data['totalitem'] = $this->M_Cart->get_row_cart($data['keranjangrow']['id_cart']);
        $data['pricechange'] = $this->M_Cart->get_tarif_sewa($data['keranjangrow']['id_cart'])->result();
        $data['totalprice'] = $this->M_Cart->get_total_price_cart($data['keranjangrow']['id_cart'])->row_array();
        //$data['tarifsewa'] = $this->M_Cart->get_tarif_sewa($data['detailkeranjangrow']['id_cart'])->result();
        $totalpricestring = implode(" ", $data['totalprice']);

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data['number'] = $this->random_number(3);

        $totalandcode = (int)$data['number'] + (int)$totalpricestring;

        $transaksi = array(
            'id_user' => $data['user']['id_user'],
            'waktu_buat_transaksi' => $now,
            'waktu_pembayaran' => NULL,
            'kode_unik_pembayaran' =>  $data['number'],
            'jumlah_pembayaran' => $totalpricestring,
            'total_pembayaran' => $totalandcode,
            'status_pembayaran' => "pending",
            'bukti_pembayaran' => NULL,
            'no_rekening_user' => NULL,
            'bank_asal_user' => NULL,
            'id_rekening_toko' => $data['checkout']['id_rekening_toko'],
        );

        $this->db->insert('transaksi', $transaksi);

        //Mengambil insert id, untuk taruh data di tabel tarifsewa
        $insertId = $this->db->insert_id();

        $sql = "INSERT INTO detailtransaksi (id_transaksi, id_produk, harga_final, qty, lama_sewa_hari, startrent, finishrent) SELECT";
        $rows = [];
        foreach ($data['productcart'] as $item) {
            $rows[] = "('{$insertId}','{$item->id_produk}','{$item->id_tarif_sewa}','{$item->qty_produk}','{$item->lama_sewa_hari}'','{$item->start_plan}','{$item->finish_plan}')";
        }
        $sql .= " FROM transaksi, produk, tarifsewa, detailcart WHERE id_cart = " . $data['keranjangrow']['id_cart'];
        $sql .= implode(",", $rows);
        $this->db->query($sql);

        /*
        #insert Order Item Details
        $sql = "insert into order_details (OID,PID,PNAME,PRICE,QTY,TOTAL) values ";
        $rows = [];
        foreach ($cart->get_all_items() as $item) {
            $rows[] = "('{$oid}','{$item["id"]}','{$item["name"]}','{$item["price"]}','{$item["qty"]}','{$item["total"]}')";
        }
        $sql .= implode(",", $rows);
        /*
                INSERT INTO table2 (st_id,uid,changed,status,assign_status)
SELECT st_id,from_uid,now(),'Pending','Assigned'
FROM table1



$dataproduk=[];*/
        /*
        $data = array(
            'id_transaksi' => $insertId,
            'id_produk' =>  $data['productcart']['id_produk'],
            'harga_final' =>  $data['productcart']['tarif_harga'],
            'qty' =>  $data['productcart']['qty_produk'],
            'lama_sewa_hari' => '1',
            'startrent' => $now,
            'finishrent' => $now
        );

        $id_transfer = "x";*/
        redirect('checkout/transfer');
    }


    //$data['number'] = $this->random_number();

    function random_number($panjang = 4)
    {
        $karakter = '0123456789';
        $data = '';

        for ($i = 1; $i <= $panjang; $i++) {
            $rand = rand(0, strlen($karakter) - 1);
            $data .= $karakter[$rand];
        }
        return $data;
    }
    //$x = random_number(3);

    //$data['number'] = $x;
    //$this->load->view('VRandom_number.php', $data);


    public function transfer()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Mohon login untuk dapat mengakses checkout.</div>');
            redirect('auth');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();
        if ($data['checkout']['shipping'] == 1) {
            $data['bookingambil'] = $this->M_Booking->getAllDistributionTakeAway()->row_array();
            $data['bookingantar'] = NULL;
        } else if ($data['checkout']['shipping'] == 2) {
            $data['bookingantar'] = $this->M_Booking->getAllDistributionSend($this->session->userdata('id_user'))->row_array();
            $data['bookingambil'] = NULL;
        }

        $data['rekening'] = $this->db->get_where('rekeningtoko', ['id_rekening_toko' => $data['checkout']['id_rekening_toko']])->row_array();
        $data['title'] = 'Review Pesanan | SharedGame';
        $data['keranjangrow'] = $this->db->get_where('cart', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['detailkeranjangrow'] = $this->db->get_where('detailcart', ['id_cart' => $data['keranjangrow']['id_cart']])->row_array();
        $data['productcart'] = $this->M_Cart->get_detail_cart($data['keranjangrow']['id_cart'])->result();
        $data['totalitem'] = $this->M_Cart->get_row_cart($data['keranjangrow']['id_cart']);
        $data['pricechange'] = $this->M_Cart->get_tarif_sewa($data['keranjangrow']['id_cart'])->result();
        $data['totalprice'] = $this->M_Cart->get_total_price_cart($data['keranjangrow']['id_cart'])->row_array();
        $data['tarifsewa'] = $this->M_Cart->get_tarif_sewa($data['detailkeranjangrow']['id_cart'])->result();

        $this->load->view('checkouttransfer.php', $data);
    }
}
