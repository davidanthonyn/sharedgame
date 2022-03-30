<?php

class M_Home extends CI_Model
{

    public function get_data()
    {
    }

    public function getAboutUs()
    {
        $query = $this->db->query('SELECT * FROM pages WHERE id_page = 1');
        return $query;
    }

    public function getFaq()
    {
        $query = $this->db->query('SELECT * FROM pages WHERE id_page = 2');
        return $query;
    }

    public function getPrivacy()
    {
        $query = $this->db->query('SELECT * FROM pages WHERE id_page = 3');
        return $query;
    }

    public function getTerms()
    {
        $query = $this->db->query('SELECT * FROM pages WHERE id_page = 4');
        return $query;
    }

    function insert_record($table, $data)
    {
        $this->db->insert($table, $data);
    }
}
