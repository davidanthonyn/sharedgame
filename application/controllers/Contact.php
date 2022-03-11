<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_CustomerService'));
        $this->load->library('form_validation');
    }

    function index()
    {
        //session_start();
        /*
        error_reporting(0);

        // DB credentials.
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'carrental');
        // Establish database connection.
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }

        $pagetype = $_GET['type'];
        $sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
       




        if (isset($_POST['send'])) {
            $name = $_POST['fullname'];
            $email = $_POST['email'];
            $contactno = $_POST['contactno'];
            $message = $_POST['message'];
            $sql = "INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
            $query->bindParam(':message', $message, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "Query Sent. We will contact you shortly";
            } else {
                $error = "Something went wrong. Please try again";
            }
        }*/
        //Model M_CustomerService pada fungsi index(panggil data CS dari database)
        $data['cs'] = $this->M_CustomerService->index()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Contact Us | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('contact-us.php', $data);
        $this->load->view('includes/footer.php', $data);
    }

    function kirim()
    {
        if ($this->form_validation->run() == false) {
            $data['cs'] = $this->M_CustomerService->index()->result();
            $data['title'] = 'Contact Us | SharedGame';
            $this->load->view('contact-us.php', $data);
        } else {
            //Model M_CustomerService pada fungsi tambahDataCustomer
            $this->M_CustomerService->tambahDataKeluhanCS();

            //Jalankan fungsi email kirim ke customer
            $this->_sendEmailToCustomer();
        }
    }

    private function _sendEmailToCustomer()
    {
        $email = $this->input->post('email', true);

        //Config gmail
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'sharedgametech@gmail.com',
            'smtp_pass' => 'sukamaingame',
            'smtp_port' => 465,
            'mail_type' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('noreply@sharedgame.tech', 'SharedGame | Do Not Reply');

        $this->email->to($email);
    }
}
