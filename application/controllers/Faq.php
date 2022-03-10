<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title'] = 'FAQ | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('faq.php');
        $this->load->view('includes/footer.php', $data);
    }
}
