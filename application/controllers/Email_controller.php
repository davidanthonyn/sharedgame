<?php

class Email_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper("form");
    }

    public function index() {
        $this->load->view("email_form");
    }

    public function send_mail() {

        $from_email = "test@blablabla.com";
        $to_email = $this->input->post("email");
        $this->load->library("email");
        $this->email->from($from_email,'Blabla');
        $this->email->to($to_email);
        $this->email->subject("Test subject");
        $this->email->message("Test message");

        if($this->email->send()) {
            $this->session->set_flashdata("email_send","Mail sent!");
        } else {
            $this->session->set_flashdata("email_send","Something went wrong!");
            $this->load->view("email_form");
        }

        $this->email->send();
    }

}