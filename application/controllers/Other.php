<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Other extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Home');
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('admin/other.php');
    }

    function aboutus()
    {
        $data['title'] = 'Tentang Kami | SharedGame';
        $data['page'] = $this->M_Home->getAboutUs()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function faq()
    {
        $data['title'] = 'FAQ | SharedGame';
        $data['page'] = $this->M_Home->getFaq()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function privacypolicy()
    {
        $data['title'] = 'Privacy Policy | SharedGame';
        $data['page'] = $this->M_Home->getPrivacy()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function termsofservices()
    {
        $data['title'] = 'Terms of Services | SharedGame';
        $data['page'] = $this->M_Home->getTerms()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        $this->load->view('includes/footer.php', $data);
    }


    /*
    function kelolaaboutus()
    {
        //kelola brand
        $this->load->model('M_Brand');
        $data['title'] = 'Kelola Brand | SharedGame';
        $data['brand'] = $this->M_Brand->getAllBrand()->result();
        $this->load->view('admin/manage-brands', $data);


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
    }*/
}
