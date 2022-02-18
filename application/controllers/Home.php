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
        $this->load->view('index.php');
    }

    public function logout()
    {
        $this->load->view('logout.php');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function newsletter()
    {
        $this->load->view('newsletter.php');
    }
}
