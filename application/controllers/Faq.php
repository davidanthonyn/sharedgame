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
        //$this->load->view('page.php?type=faqs');
        $this->load->view('faq.php');
    }
}
