<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
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

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_Dosen', 'M_Prodi'));
	}

	function index()
	{
		$data['dosen'] = $this->M_Dosen->tampilkan_record()->result();

		$this->load->view('v_lihat_dosen.php', $data);
	}

	function tambah_data()
	{
		$data['prodi'] = $this->M_Prodi->tampilkan_record()->result();
		$this->load->view('v_input_dosen.php', $data);
	}

	function proses_tambah_data()
	{

		$tangkapNidn = $this->input->post('nidn');
		$tangkapNamaDosen = $this->input->post('nama_dosen');
		$tangkapkode_prodi = $this->input->post('kode_prodi');
		$tangkapEmailDosen = $this->input->post('email_dosen');

		$data = array(
			'nidn' => $tangkapNidn,
			'nama_dosen' => $tangkapNamaDosen,
			'kode_prodi' => $tangkapkode_prodi,
			'email_dosen' => $tangkapEmailDosen
		);

		$this->M_Dosen->insert_record('dosen', $data);


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
		$mail->addAddress($tangkapEmailDosen); 	// Add a recipient
		$mail->Subject = 'Hallo';					// Email subject
		$mail->Body       = 'Selamat Registrasi Anda berhasil ';					// Set email Body


		if (!$mail->Send()) {
			echo "Eror: " . $mail->ErrorInfo;
		} else {
			redirect('Dosen');
		}
	}

	function edit_data($id_dosen)
	{
		$where = array('nidn' => $id_dosen);
		$data['dosenEdit'] = $this->M_Dosen->edit_record('dosen', $where)->result();
		$data['prodi'] = $this->M_Prodi->tampilkan_record()->result();
		$this->load->view('v_edit_dosen', $data);
	}

	function proses_edit_data()
	{
		$tangkapNidn = $this->input->post('nidn');
		$tangkapNamaDosen = $this->input->post('nama_dosen');
		$tangkapkode_prodi = $this->input->post('kode_prodi');
		$tangkapEmailDosen = $this->input->post('email_dosen');

		$data = array(
			'nama_dosen' => $tangkapNamaDosen,
			'kode_prodi' => $tangkapkode_prodi,
			'email_dosen' => $tangkapEmailDosen
		);

		$where = array(
			'nidn' => $tangkapNidn
		);

		$this->M_Dosen->update_record($where, $data, 'dosen');
		redirect('Dosen');
	}

	//Function menghapus data

	function delete_data($id_dosen)
	{
		$where = array('nidn' => $id_dosen);
		$this->M_Dosen->delete_record($where, 'dosen');
		redirect('Dosen');
	}

	function session_data()
	{
		$this->load->view('v_input_session_dosen.php');
	}

	function session_login()
	{
		$this->load->view('v_login_session_dosen.php');
	}



	function proses_session_login()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "uph";
		$errors = array();

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


		if ($this->input->post('login') == true) {
			$tangkapEmailDosen = mysqli_real_escape_string($conn, $_POST['username']);
			$tangkapNidn = mysqli_real_escape_string($conn, $_POST['password']);
			//$tangkapEmailDosen = $this->input->post('username');
			//$tangkapNidn = $this->input->post('password');

			$query = "SELECT * FROM dosen WHERE email_dosen='$tangkapEmailDosen' AND nidn='$tangkapNidn'";

			$result = mysqli_query($conn, $query);

			if (mysqli_num_rows($result) === 1) {

				$row = mysqli_fetch_assoc($result);

				$session_data = array(
					'password' => $tangkapNidn,
					'username' => $tangkapEmailDosen
				);

				$this->session->set_userdata($session_data);

				$this->load->view('v_home.php');


				/*$data = array(
			'username' => $tangkapEmailDosen
		);

		$where = array(
			'password' => $tangkapNidn
		);
*/
			} else {
?>
				<script>
					alert("Data invalid!");
				</script>
<?php
				$this->load->view('v_login_session_dosen.php');
			}
		}
	}

	function logout_session_dosen()
	{
		$this->session->sess_destroy();
		redirect('Dosen/session_login');
	}

	//Function Process Session Data
	function proses_session_data()
	{
		if ($this->input->post('simpan') == true) {
			$tangkapNidn = $this->input->post('nidn');
			$tangkapNamaDosen = $this->input->post('nama_dosen');

			$session_data = array(
				'nidn' => $tangkapNidn,
				'nama_dosen' => $tangkapNamaDosen
			);

			$this->session->set_userdata($session_data);

			$this->load->view('v_lihat_session_dosen.php');
		} else if ($this->input->post('hapus') == true) {
			$this->session->sess_destroy();
			redirect('Dosen/session_data');
		} else if ($this->input->post('lihat') == true) {
			$this->load->view('v_lihat_session_dosen.php');
		}
	}
}
?>