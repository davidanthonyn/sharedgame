<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Other extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Home');
        $this->load->library('form_validation');
        $this->load->model('M_Page');
    }

    function index()
    {
        $data["page"] = $this->M_Page->GetPageByType($type);
        $data['title'] = 'Products | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('game-listing.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    function info($type)
    {
        //$where = array('type' => $type);

        $data["page"] = $this->M_Page->GetPageByType($type);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = $data["page"][0]["page_name"] . ' | SharedGame';
        //$data["page"] = $this->M_Home->getFaq()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    function detail($id)
    {
        //$this->load->database();
        //$this->load->model('Modelproduk');
        //$this->load->model('M_Rekening');
        //$data['rekening'] = $this->M_Rekening->getAllRekening();
        //$where = array('id_produk' => $id);
        // $data['tarifsewa'] = $this->Modelproduk->tarif_sewa($where, 'tarifsewa')->result_array();
        $data["data"] = $this->Modelproduk->GetProdukById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('includes/header.php', $data);
        $this->load->view('detailproduk.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }
    /*
    function aboutus()
    {
        $data['title'] = 'Tentang Kami | SharedGame';
        $data['page'] = $this->M_Home->getAboutUs()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    function faq()
    {
        $data['title'] = 'FAQ | SharedGame';
        $data['page'] = $this->M_Home->getFaq()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    function privacypolicy()
    {
        $data['title'] = 'Privacy Policy | SharedGame';
        $data['page'] = $this->M_Home->getPrivacy()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        // $this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    function termsofservices()
    {
        $data['title'] = 'Terms of Services | SharedGame';
        $data['page'] = $this->M_Home->getTerms()->result();
        $this->load->view('includes/header.php', $data);
        $this->load->view('page.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }
    */

    public function footer()
    {
        $data['pages'] = $this->M_Page->getAllRowPages()->result();
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
