<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

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

	function __construct() {
		parent::__construct();
		$this->load->model(array('M_Matkul'));
	}
	
	function index() {
		$data['matkul'] = $this->M_Matkul->tampilkan_record()->result();

			$this->load->view('v_lihat_matakuliah.php',$data);
	}
	
	public function lihat_data()
	{
		$this->load->view('v_lihat_matakuliah.php');
	}

	function tambah_data() {
		$this->load->view('v_input_matkul.php');
	}

	function proses_tambah_data() {

		$tangkapKodeMatkul = $this->input->post('kode_matkul');
		$tangkapNamaMatkul = $this->input->post('nama_matkul');
		$tangkapSks = $this->input->post('sks');
		$tangkapSisaKuota = $this->input->post('sisa_kuota');

		$data = array(
			'kode_matkul' => $tangkapKodeMatkul,
			'nama_matkul' => $tangkapNamaMatkul,
			'sks' => $tangkapSks,
			'sisa_kuota' => $tangkapSisaKuota
		);

		$this->M_Matkul->insert_record('matkul',$data);

		redirect('Matakuliah');
	}

	function edit_data($kode_matkul) {
		$where = array('kode_matkul' => $kode_matkul);
		$data['matkulEdit'] = $this->M_Matkul->edit_record('matkul', $where)->result();
		$this->load->view('v_edit_matkul',$data);
	}

	function proses_edit_data() {
		$tangkapKodeMatkul = $this->input->post('kode_matkul');
		$tangkapNamaMatkul = $this->input->post('nama_matkul');
		$tangkapSks = $this->input->post('sks');
		$tangkapSisaKuota = $this->input->post('sisa_kuota');

		$data = array(
			'nama_matkul' => $tangkapNamaMatkul,
			'sks' => $tangkapSks,
			'sisa_kuota' => $tangkapSisaKuota
		);

		$where = array(
			'kode_matkul' => $tangkapKodeMatkul
		);

		$this->M_Matkul->update_record($where,$data,'matkul');
		redirect('Matakuliah');
	}

	//Function menghapus data

	function delete_data($kode_matkul) {
		$where = array('kode_matkul' => $kode_matkul);
		$this->M_Matkul->delete_record($where,'matkul');
		redirect('Matakuliah');
	}
}
