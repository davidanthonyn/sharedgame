<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enroll extends CI_Controller
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
		$this->load->model(array('M_Enroll', 'M_Jadwal', 'M_Dosen', 'M_Matkul', 'M_Mahasiswa'));
	}

	function index()
	{
		$data['enroll'] = $this->M_Enroll->tampilkan_record()->result();

		$this->load->view('v_lihat_enroll.php', $data);
	}

	function tambah_data()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkan_record()->result();
		$data['matkul'] = $this->M_Matkul->tampilkan_record()->result();
		$this->load->view('v_input_enroll.php', $data);
	}

	function proses_tambah_data()
	{
		$tangkapNpm = $this->input->post('npm');
		$tangkapNamaMahasiswa = $this->input->post('nama_mahasiswa');
		$tangkapKodeMatkul = $this->input->post('kode_matkul');
		$tangkapEmailMahasiswa = $this->input->post('email');
		$tangkapSisaKuota = $this->input->post('sisa_kuota');
		$SisaKuotaInt = (int) $tangkapSisaKuota;


		$data = array(
			'npm' => $tangkapNpm,
			'kode_matkul' => $tangkapKodeMatkul
		);

		$this->load->library('Phpmailer_lib');

		$mail = $this->phpmailer_lib->load();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
		$mail->Port       = 587;                   // SMTP port to connect to GMail
		$mail->Username   = "danthonynathanael@gmail.com";  // alamat email kamu
		$mail->Password   = "Elemagik4";            // password GMail
		$mail->setFrom('danthonynathanael@gmail.com', 'David'); //email alias
		$mail->addAddress($tangkapEmailMahasiswa); 	// Add a recipient
		$mail->Subject = 'Hallo';						// Email subject
		//$mail->Body       = 'Selamat Registrasi Anda berhasil ';					// Set email Body

		$this->db->trans_begin();

		$this->db->query("UPDATE matkul SET sisa_kuota = sisa_kuota - 1 WHERE kode_matkul = $tangkapKodeMatkul");
		$this->M_Enroll->insert_record('enroll', $data);

		if ($SisaKuotaInt != '0') {
			$this->db->trans_commit();
			$mail->Body       = 'Selamat Registrasi Anda berhasil ';					// Set email Body
			//redirect('Enroll');
		} else {
			$this->db->trans_rollback();
			$mail->Body       = 'Maaf, registrasi Anda gagal karena kuota habis. Coba lagi.';					// Set email Body
			//redirect('Enroll');
		}

		if (!$mail->Send()) {
			echo "Eror: " . $mail->ErrorInfo;
		} else {
			redirect('Enroll');
		}
	}

	function edit_data($kodeEnroll)
	{
		$where = array('kode_enroll' => $kodeEnroll);
		$data['enrollEdit'] = $this->M_Enroll->edit_record('enroll', $where)->result();
		//$data['mahasiswaEdit'] = $this->M_Mahasiswa->edit_record('mahasiswa', $where)->result();
		//$data['matkulEdit'] = $this->M_Matkul->edit_record('matkul', $where) - result();
		$this->load->view('v_edit_enroll.php', $data);
	}

	function proses_edit_data()
	{
		$tangkapKodeEnroll = $this->input->post('kode_enroll');
		$tangkapNpm = $this->input->post('npm');
		$tangkapKodeMatkul = $this->input->post('kode_matkul');

		$data = array(
			'npm' => $tangkapNpm,
			'kode_matkul' => $tangkapKodeMatkul
		);

		$where = array(
			'kode_enroll' => $tangkapKodeEnroll
		);

		$this->M_Enroll->update_record($where, $data, 'enroll');
		redirect('Enroll');
	}

	//Function menghapus data

	function delete_data($kodeEnroll)
	{
		$where = array('kode_enroll' => $kodeEnroll);
		$this->M_Enroll->delete_record($where, 'enroll');
		redirect('Enroll');
	}
}
