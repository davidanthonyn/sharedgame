<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('contact-us.php');
    }
}