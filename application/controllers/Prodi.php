<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	 /*
	 public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function lihat_data()
	{
		$this->load->view('v_lihat_dosen');
	}
	*/

	function __construct() {
		parent::__construct();
		$this->load->model(array('M_Prodi'));
	}

	function index() {
		$data['prodi'] = $this->M_Prodi->tampilkan_record()->result();

		$this->load->view('v_Prodi.php', $data);
	}

	function tambah_data() {
		$this->load->view('v_input_prodi.php');
	}

	function proses_tambah_data() {

		$tangkapKodeProdi = $this->input->post('kode_prodi');
		$tangkapNamaProdi = $this->input->post('nama_prodi');

		$data = array(
			'kode_prodi' => $tangkapKodeProdi,
			'nama_prodi' => $tangkapNamaProdi
		);

		$this->M_Prodi->insert_record('prodi',$data);

		redirect('Prodi');

	}

	function edit_data($kode_prodi) {
		$where = array('kode_prodi' => $kode_prodi);
		$data['prodiEdit'] = $this->M_Prodi->edit_record('prodi', $where)->result();
		$this->load->view('v_edit_prodi',$data);
	}

	function proses_edit_data() {
		$tangkapKodeProdi = $this->input->post('kode_prodi');
		$tangkapNamaProdi = $this->input->post('nama_prodi');

		$data = array(
			'nama_prodi' => $tangkapNamaProdi
		);

		$where = array(
			'kode_prodi' => $tangkapKodeProdi
		);

		$this->M_Prodi->update_record($where,$data,'prodi');
		redirect('Prodi');
	}

	//Function menghapus data

	function delete_data($kode_prodi) {
		$where = array('kode_prodi' => $kode_prodi);
		$this->M_Prodi->delete_record($where,'prodi');
		redirect('Prodi');
	}
}
