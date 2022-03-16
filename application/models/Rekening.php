<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_model
{
    public function getAllRekening()
    {
        return $this->db->get('rekeningtoko')->result_array();
    }

    
}
