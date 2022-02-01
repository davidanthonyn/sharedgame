<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Matkul extends CI_Model {

    public function tampilkan_record()
	{
		
		$query = $this->db->query('SELECT * FROM matkul');
		return $query;
	}

	function insert_record($table, $data) {
		$this->db->insert($table, $data);
	}

	//Mengambil data dosen berdasarkan kriteria (where)
	function edit_record($table, $where) {
		return $this->db->get_where($table, $where);
	}

	function update_record($where,$data,$table) {
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_record($where,$table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	function get_sks_by_ajax($where) {
		$query= $this->db->get_where('matkul',$where);
				foreach ($query->result() as $data) {
				$output=array(
				'sks' => $data->sks,
				'sisa_kuota' => $data->sisa_kuota
				);
				}
		return $output;
	}
}