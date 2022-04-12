<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Page');
        $this->load->model('M_Rekening');
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
        $data['title'] = 'Transaksi Berhasil | SharedGame';
        $data['rekening'] = $this->M_Rekening->getAllRekening()->result();
        //var_dump($data['rekening']);
        //die;
        //$this->load->view('includes/header.php', $data);
        $this->load->view('checkoutrekening.php', $data);
        //$this->footer();
    }

    public function shipping()
    {
    }

    public function payment()
    {
    }

    public function success()
    {
    }
}
