<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Home');
        $this->load->model('M_User');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $to =  'kontolbinatang@protonmail.com';  // User email pass here
        $subject = 'Welcome To Elevenstech';

        $from = 'noreply@sharedgame.tech';              // Pass here your mail id

        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
        $emailContent .= '<tr><td style="height:20px"></td></tr>';


        //$emailContent .= $this->input->post('message');  //   Post message available here


        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";



        $config['protocol'] = 'sendmail';
        $config['smtp_host'] = 'localhost';
        $config['smtp_user']    = 'noreply@sharedgame.tech';
        $config['smtp_pass']    = 'p_X$KQFgOWOL';
        $config['smtp_port'] = 25;


        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 



        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();

        echo "berhasil";
    }
}
