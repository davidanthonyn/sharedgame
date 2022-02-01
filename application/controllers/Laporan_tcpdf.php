<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_tcpdf extends CI_Controller {
    public function __construct()
        {   
            parent::__construct();
			$this->load->model('M_Dosen');
            $this->load->library('Tc_pdf');
        }
    public function index()
        {			
			$data['dosen'] = $this->M_Dosen->tampilkan_record()->result();
			$this->load->view('v_tcpdf', $data);
        }
}