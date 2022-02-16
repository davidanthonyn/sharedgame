<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('index.php');
    }

    function profile_settings() {
        $this->load->view('profile.php');
    }

    function my_booking() {
        $this->load->view('profile.php');
    }

    function post_testimonial() {
        $this->load->view('post-testimonial.php');
    }

    function manage_testimonial() {
        $this->load->view('my-testimonials.php');
    }

}