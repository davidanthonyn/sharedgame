<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('car-listing.php');
    }
}