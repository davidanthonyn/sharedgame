<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Home');
        $this->load->model('M_User');
        $this->load->library('session');
        $this->load->helper('url');
    }
}
