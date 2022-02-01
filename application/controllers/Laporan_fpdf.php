<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_fpdf extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_Dosen');
		$this->load->library('f_pdf');
	}

	public function index()
        {			
			$data['dosen'] = $this->M_Dosen->tampilkan_record()->result();
			$this->load->view('v_fpdf', $data);
        }
		
}
?>