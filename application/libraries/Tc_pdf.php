<?php
include_once APPPATH .'/third_party/tcpdf/tcpdf.php';
class Tc_pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}