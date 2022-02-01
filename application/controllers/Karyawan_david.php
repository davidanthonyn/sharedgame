<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_david extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->model(array('M_karyawan_david','M_jabatan_david'));
	}

    function index() {
		if(!empty($this->session->userdata('nama_user'))) {
							$data['karyawan'] = $this->M_karyawan_david->tampilkan_record()->result();

							$this->load->view('v_lihat_karyawan_david.php', $data); 
						} else {
							redirect('Home_david');
							}

	}



	function tambah_data_david() {
			if(!empty($this->session->userdata('nama_user'))) {
				$data['jabatan'] = $this->M_jabatan_david->tampilkan_record()->result();
				$this->load->view('v_input_karyawan_david.php',$data);
			} else {
				redirect('Home_david');
			}
	}

	function proses_tambah_data_david() {

		$tangkapNikDavid = $this->input->post('nik_david');
		$tangkapNamaKaryawanDavid = $this->input->post('nama_karyawan_david');
		$tangkapNoHpDavid = $this->input->post('no_hp_david');
		$tangkapJenisKelaminDavid = $this->input->post('jenis_kelamin_david');
		$tangkapIDJabatanDavid = $this->input->post('id_jabatan_david');

			if (!empty($tangkapNikDavid) && !empty($tangkapNamaKaryawanDavid) && !empty($tangkapNoHpDavid)) {

			$data = array(
				'nik' => $tangkapNikDavid,
				'nama_karyawan' => $tangkapNamaKaryawanDavid,
				'no_hp' => $tangkapNoHpDavid,
				'jenis_kelamin' => $tangkapJenisKelaminDavid,
				'id_jabatan' => $tangkapIDJabatanDavid
			);

			$this->M_karyawan_david->insert_record('karyawan',$data);

			redirect('Karyawan_david');
			
			} else {
				$dataDavidRequired = "Data tidak lengkap";
			}
}

	function batal_inputeditkaryawan_data_david() {
		redirect('Karyawan_david');
	}

	function edit_data_david($nik_david) {
		if(!empty($this->session->userdata('nama_user'))) {

		$where = array('nik' => $nik_david);
		$data['karyawanDavidEdit'] = $this->M_karyawan_david->edit_record('karyawan', $where)->result();
		$data['jabatan'] = $this->M_jabatan_david->tampilkan_record()->result();
		$this->load->view('v_edit_karyawan_david',$data);
		
	} else {
		redirect('Home_david');
	}
	}

	function proses_edit_data_david() {
		$tangkapNikDavid = $this->input->post('nik_david');
		$tangkapNamaKaryawanDavid = $this->input->post('nama_karyawan_david');
		$tangkapNoHpDavid = $this->input->post('no_hp_david');
		$tangkapJenisKelaminDavid = $this->input->post('jenis_kelamin_david');
		$tangkapIDJabatanDavid = $this->input->post('id_jabatan_david');

		

		$data = array(
			'nama_karyawan' => $tangkapNamaKaryawanDavid,
				'no_hp' => $tangkapNoHpDavid,
				'jenis_kelamin' => $tangkapJenisKelaminDavid,
				'id_jabatan' => $tangkapIDJabatanDavid
		);

		$where = array(
			'nik' => $tangkapNikDavid
		);

		$this->M_karyawan_david->update_record($where,$data,'karyawan');
		redirect('Karyawan_david');
	}

	function delete_data_david($nik_david) {
		$where = array('nik' => $nik_david);
		$this->M_karyawan_david->delete_record($where,'karyawan');
		redirect('Karyawan_david');
	}

}

