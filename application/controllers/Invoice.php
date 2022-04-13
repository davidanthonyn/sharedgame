<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //$this->load->model('M_Invoice');
        $this->load->model('M_Page');
    }

    function view()
    {
        $this->load->view('invoice/invoice.php');
    }
}
