<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Home');
        $this->load->model('M_Page');
    }

    function index()
    {
        $data['title'] = 'SharedGame | The Best Rental Gaming Equipment';
        $data['bannerbig'] = 'FIND THE IDEAL GAME FOR YOU.';
        $data['bannersmall'] = 'We have more games for you to choose.';
        $data['boldfonttitle'] = 'Find the Best';
        $data['unboldfonttitle'] = 'Gaming Gear to Rent';
        $data['smallsentence'] = 'Apa yang kamu butuhkan untuk bermain game?
                                Kami menyediakan berbagai macam game untuk kamu.';

        $this->load->database();
        $this->load->model('Modelproduk');
        $data["produk"] = $this->Modelproduk->GetProduk();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('includes/header.php', $data);
        $this->load->view('index.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    public function footer()
    {
        $data['pages'] = $this->M_Page->getAllRowPages()->result();
        $this->load->view('includes/footer.php', $data);
    }

    public function newsletter()
    {
        $this->load->view('emailtemplates/newsletter.php');
    }

    public function confirm()
    {
        $this->load->view('emailtemplates/confirm_account.php');
    }


    public function error_404()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Not Found | SharedGame';
        $this->load->view('includes/header.php', $data);
        $this->load->view('404.php', $data);
        //$this->load->view('includes/footer.php', $data);
        $this->footer();
    }

    public function subscribe()
    {
        //print "<script>alert('Subscribed successfully.');</script>";

        /*
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is.unique[newsletter.email]', [
            'is.unique' => 'This email has already been registered!'
        ]);

        if ($this->form_validation->run() == false) {
            redirect(base_url());
        } else {*/
        $email = $this->input->post('email');

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $data = [
            'email' => $email,
            'is_active' => 'yes',
            'joined_at' => $now,
            'last_updated_at' => $now
        ];

        //Menjalankan model home untuk mengirim data ke tabel newsletter
        $this->M_Home->insert_record('newsletter', $data);
        //Alert berhasil
        $this->session->flashdata('flash', 'Ditambahkan');
        redirect(base_url());
        //}
    }

    public function kirimEmail()
    {
        require APPPATH . 'smtp\PHPMailerAutoload.php';

        //require APPPATH . 'phpmailer\src\Exception.php';
        //require APPPATH . 'phpmailer\src\PHPMailer.php';
        //require APPPATH . 'phpmailer\src\SMTP.php';

        $html = 'Msg';

        function smtp_mailer($to, $subject, $msg)
        {
            $mail = new PHPMailer();
            $mail->SMTPDebug  = 2;
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = "ns02.000webhost.com";
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = "noreply@sharedgame.tech";
            $mail->Password = "qmSgTyH6";
            $mail->SetFrom("noreply@sharedgame.tech");
            $mail->Subject = $subject;
            $mail->Body = $msg;
            $mail->AddAddress($to);
            $mail->SMTPOptions = array('ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));
            if (!$mail->Send()) {
                echo $mail->ErrorInfo;
            } else {
                return 'Sent';
            }
        }
        echo smtp_mailer('danthonynathanael@gmail.com', 'Test Email', $html);
    }

    public function sendEmailHery()
    {
        $this->load->library('Phpmailer_lib');

        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->Host       = "ns02.000webhost.com";      // setting GMail as our SMTP server
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->Port       = 587;                   // SMTP port to connect to GMail
        $mail->Username   = "noreply@sharedgame.tech";  // alamat email kamu
        $mail->Password   = "qmSgTyH6";            // password GMail
        $mail->setFrom('noreply@sharedgame.tech', 'David'); //email alias
        $mail->addAddress('kontolbinatang@protonmail.com');     // Add a recipient
        $mail->Subject = 'Hallo';                    // Email subject
        $mail->Body       = 'Selamat Registrasi Anda berhasil ';                    // Set email Body


        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
        } else {
            return 'Sent';
        }
    }

    public function tes_subs()
    {
        //date_default_timezone_set("Asia/Jakarta");
        //echo "The time is " . date("h:i:sa");
        $validity = '1 month';
        $date = new DateTime('next month');
        $todayDate = new DateTime();

        if ($date >= $todayDate) {
            echo "your membership valid until <b>" . $date->format('d-M-Y') . '</b>';
            echo "<br><br>";
            echo "valid membership";
        } else {
            echo $date->format('d-M-Y');
            echo "your membership has expired";
        }
    }

    //subscription satu bulan
    public function str_subs_satubulan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $d = strtotime("+1 Months");
        echo date("Y-m-d h:i:sa", $d) . "<br>";
    }

    //subscription tiga bulan
    public function str_subs_tigabulan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $d = strtotime("+3 Months");
        echo date("Y-m-d h:i:sa", $d) . "<br>";
    }

    //subscription enam bulan
    public function str_subs_enambulan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $d = strtotime("+6 Months");
        echo date("Y-m-d h:i:sa", $d) . "<br>";
    }
}
