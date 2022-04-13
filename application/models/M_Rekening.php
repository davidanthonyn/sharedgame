<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Rekening extends CI_model
{
    public function getAllRekening()
    {
        $query = $this->db->query("SELECT * FROM rekeningtoko WHERE status_rekening_toko = 'aktif'");
        return $query;
    }

    public function getRekening($where){
        $this->db->where('no_rekening_toko', $where);
        return $this->db->get('rekeningtoko')->result_array();
    }

    public function AllRekening()
    {
        return $this->db->get('rekeningtoko');
    }

    function insert_record($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function edit_record($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function update_record($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_record($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
