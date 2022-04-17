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
    }

    public function index()
    {
        redirect('checkout/shipping');
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
        $data['title'] = 'Pilih Pembayaran | SharedGame';
        $data['rekening'] = $this->M_Rekening->getAllRekening()->result();
        //var_dump($data['rekening']);
        //die;
        //$this->load->view('includes/header.php', $data);
        $this->load->view('checkoutrekening.php', $data);
        //$this->footer();
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

        $data['checkout'] = $this->db->get_where('checkout', ['id_user' => $this->session->userdata('id_user')])->row_array();

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

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

    public function success()
    {
    }
}
