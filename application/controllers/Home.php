<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title'] = 'SharedGame | The Best Rental Gaming Equipment';
        $data['bannerbig'] = 'FIND THE IDEAL GAME FOR YOU.';
        $data['bannersmall'] = 'We have more games for you to choose.';
        $data['boldfonttitle'] = 'Find the Best';
        $data['unboldfonttitle'] = 'Gaming Gear to Rent';
        $data['smallsentence'] = 'Apa yang kamu butuhkan untuk bermain game?
                                Kami menyediakan berbagai macam game untuk kamu.';

        $this->load->database();
        $this->load->model('Modelproduk');
        $data["produk"] = $this->Modelproduk->GetProduk();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('includes/header.php', $data);
        $this->load->view('index.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    public function newsletter()
    {
        $this->load->view('emailtemplates/newsletter.php');
    }

    public function confirm()
    {
        $this->load->view('emailtemplates/confirm_account.php');
    }


    public function error_404()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Not Found | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('404.php', $data);
        $this->load->view('includes/footer.php', $data);
    }
}
