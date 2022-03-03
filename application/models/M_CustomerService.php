<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_CustomerService extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $query = $this->db->query('SELECT * FROM customerservice WHERE id_cs = 1');
        return $query;
    }
}
