<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('index.php');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}