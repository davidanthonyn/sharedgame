<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Other extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('admin/other.php');
    }

    function aboutus()
    {
        $data['title'] = 'Tentang Kami | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('about-us.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function faq()
    {
        $data['title'] = 'FAQ | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('faq.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function privacypolicy()
    {
        $data['title'] = 'Privacy Policy | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('privacy-policy.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function termsofservices()
    {
        $data['title'] = 'Terms of Services | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('terms.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function kelolaaboutus()
    {
        $data['title'] = 'Kelola About Us | SharedGame';
        $this->load->view('admin/manage-pages.php', $data);
    }

    function kelolafaq()
    {
        $data['title'] = 'Kelola FAQ | SharedGame';
        $this->load->view('admin/manage-pages.php', $data);
    }

    function kelolaprivacy()
    {
        $data['title'] = 'Kelola Privacy | SharedGame';
        $this->load->view('admin/manage-pages.php', $data);
    }

    function kelolaterms()
    {
        $data['title'] = 'Kelola Terms | SharedGame';
        $this->load->view('admin/manage-pages.php', $data);
    }
}
