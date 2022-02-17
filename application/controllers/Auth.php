<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('includes/auth_header');
        $this->load->view('includes/login');
        $this->load->view('includes/auth_footer');
    }

    public function registration()
    {
        $this->load->view('includes/auth_header');
        $this->load->view('includes/registration');
        $this->load->view('includes/auth_footer');

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');


        #form validasi salah
        if ($this->form_validation->run() == false) {
            $data['title'] = 'SharedGame | Registration';
        } else {
            echo 'data berhasil ditambahkan!';
        }
    }
}
