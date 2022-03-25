<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 
class Checkout extends CI_Controller {
    public function proses_checkout()
    {
        $this->load->view('v_chekout');

    }
public function berhasil()
{
    $data['title'] = 'Transaksi Berhasil | SharedGame';
    $this->load->view('includes/header.php', $data);
    $this->load->view('sukses', $data);
    $this->load->view('includes/footer.php', $data);
}
}

