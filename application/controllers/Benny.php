<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Benny extends CI_Controller
{

    function index()
    {

        $this->load->view('contactusbenny/contactusbenny.php');
    }

    function process()
    {
        $this->load->view('contactusbenny/processbenny.php');
    }
}
