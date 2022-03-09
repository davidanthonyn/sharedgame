<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
        } else {
            redirect('');
        }
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

    public function edit()
    {
        $data['title'] = 'Edit Profile | SharedGame';
        $this->load->view('profile.php', $data);
    }
}
