<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

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

	/*public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function lihat_data()
	{
		$this->load->view('v_lihat_mahasiswa');
	}
	*/

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_Mahasiswa'));
	}

	function index()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkan_record()->result();

		$this->load->view('v_Mahasiswa.php', $data);
	}

	function tambah_data()
	{
		$this->load->view('v_input_mahasiswa.php');
	}

	function proses_tambah_data()
	{

		$tangkapNpm = $this->input->post('npm');
		$tangkapNamaMahasiswa = $this->input->post('nama_mahasiswa');
		$tangkapEmailMahasiswa = $this->input->post('email_mahasiswa');
		$tangkapKodeProdi = $this->input->post('kode_prodi');


		$data = array(
			'npm' => $tangkapNpm,
			'nama_mahasiswa' => $tangkapNamaMahasiswa,
			'email_mahasiswa' => $tangkapEmailMahasiswa,
			'kode_prodi' => $tangkapKodeProdi
		);

		$this->M_Mahasiswa->insert_record('mahasiswa', $data);

		redirect('Mahasiswa');
	}

	function edit_data($npm)
	{
		$where = array('npm' => $npm);
		$data['mahasiswaEdit'] = $this->M_Mahasiswa->edit_record('mahasiswa', $where)->result();
		$this->load->view('v_edit_mahasiswa', $data);
	}

	function proses_edit_data()
	{
		$tangkapNpm = $this->input->post('npm');
		$tangkapNamaMahasiswa = $this->input->post('nama_mahasiswa');
		$tangkapEmailMahasiswa = $this->input->post('email_mahasiswa');
		$tangkapKodeProdi = $this->input->post('kode_prodi');

		$data = array(
			'nama_mahasiswa' => $tangkapNamaMahasiswa,
			'email_mahasiswa' => $tangkapEmailMahasiswa,
			'kode_prodi' => $tangkapKodeProdi
		);

		$where = array(
			'npm' => $tangkapNpm
		);

		$this->M_Mahasiswa->update_record($where, $data, 'mahasiswa');
		redirect('Mahasiswa');
	}

	//Function menghapus data

	function delete_data($npm)
	{
		$where = array('npm' => $npm);
		$this->M_Mahasiswa->delete_record($where, 'mahasiswa');
		redirect('Mahasiswa');
	}
}
