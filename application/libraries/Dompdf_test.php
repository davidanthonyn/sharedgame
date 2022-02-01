<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dompdf_test extends CI_Controller {
 
	public function index()
	{
 
	    $html = $this->load->view('v_print_dom');
	    
	}
}