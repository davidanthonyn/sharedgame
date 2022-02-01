<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_david extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->model(array('M_jabatan_david'));
	}

    function index() {
		if(!empty($this->session->userdata('nama_user'))) {
			$data['jabatan'] = $this->M_jabatan_david->tampilkan_record()->result();

		$this->load->view('v_lihat_jabatan_david.php', $data);
		} else {
			redirect('Home_david');
		}
			
    
	}



	function tambah_data_david() {
		if(!empty($this->session->userdata('nama_user'))) {

			$data['jabatan'] = $this->M_jabatan_david->tampilkan_record()->result();

 			$this->load->view('v_input_jabatan_david.php',$data);

		} else {
			redirect('Home_david');
		}
	}

	function proses_tambah_data_david() {
		$tangkapNamaJabatanDavid = $this->input->post('nama_jabatan');
		$tangkapTunjanganJabatanDavid = $this->input->post('tunjangan_jabatan');

		$data = array(
			'nama_jabatan' => $tangkapNamaJabatanDavid,
			'tunjangan_jabatan' => $tangkapTunjanganJabatanDavid
		);

		$this->M_jabatan_david->insert_record('jabatan',$data);

		redirect('Jabatan_david');

	}

	function batal_inputeditjabatan_data_david() {
		redirect('Jabatan_david');
	}

	function edit_data_david($id_jabatan_david) {
		if(!empty($this->session->userdata('nama_user'))) {

			$where = array('id_jabatan' => $id_jabatan_david);
			$data['jabatanDavidEdit'] = $this->M_jabatan_david->edit_record('jabatan', $where)->result();
			$data['jabatan'] = $this->M_jabatan_david->tampilkan_record()->result();
			$this->load->view('v_edit_jabatan_david',$data);

		} else {
			redirect('Home_david');
		}
	}

	function proses_edit_data_david() {
		$tangkapIdJabatandavid = $this->input->post('id_jabatan_david');
		$tangkapNamaJabatandavid = $this->input->post('nama_jabatan_david');
		$tangkapTunjanganJabatandavid = $this->input->post('tunjangan_jabatan_david');

		$data = array(
			'nama_jabatan' => $tangkapNamaJabatandavid,
			'tunjangan_jabatan' => $tangkapTunjanganJabatandavid
		);

		$where = array(
			'id_jabatan' => $tangkapIdJabatandavid
		);

		$this->M_jabatan_david->update_record($where,$data,'jabatan');
		redirect('Jabatan_david');
	}

	function delete_data_david($id_jabatan_david) {
		$where = array('id_jabatan' => $id_jabatan_david);
		$this->M_jabatan_david->delete_record($where,'jabatan');
		redirect('Jabatan_david');
	}

}

