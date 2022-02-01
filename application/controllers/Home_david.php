<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_david extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
		if(!empty($this->session->userdata('nama_user'))) {
			$this->load->view('v_home_david.php');
		} else {
			$this->load->view('v_loginpage_david.php');
		}
    }

    function session_login_david() {
		$this->load->view('v_loginpage_david.php');
	}


	function proses_session_login_david() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pt_david";
		$errors = array();
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}


		if($this->input->post('login') == true) {
			$tangkapNamaUserdavid = $this->input->post('nama_user_david');
			$tangkapPassworddavid = $this->input->post('password_david');

		$query = "SELECT * FROM user WHERE nama_user='$tangkapNamaUserdavid' AND password='$tangkapPassworddavid'";

		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

						$session_data = array(
							'password' => 	$tangkapPassworddavid,
							'nama_user' => $tangkapNamaUserdavid
						);
				
						$this->session->set_userdata($session_data);
					
						//$this->load->view('v_home_david.php');

						redirect('Home_david');

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
						$this->load->view('v_loginpage_david.php');
				}
		}
}

    function logout_session_david() {
		$this->session->sess_destroy();
		redirect('Home_david/session_login_david');
	}

}

