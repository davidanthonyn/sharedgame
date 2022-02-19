<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        echo "selamat datang user";
    }

    function __construct()
    {
        parent::__construct();
    }

    function profile_settings()
    {
        $this->load->view('profile.php');
    }

    function my_booking()
    {
        $this->load->view('profile.php');
    }

    function post_testimonial()
    {
        $this->load->view('post-testimonial.php');
    }

    function manage_testimonial()
    {
        $this->load->view('my-testimonials.php');
    }
}
