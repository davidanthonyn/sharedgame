<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dosen extends CI_Model
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/*public function tampilkan_record()
	{
		
		$query = $this->db->query('SELECT * FROM dosen');
		return $query;
	}*/

	function insert_record($table, $data)
	{
		$this->db->insert($table, $data);
	}

	//Mengambil data dosen berdasarkan kriteria (where)
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

	function tampilkan_record()
	{
		$query = $this->db->query('SELECT dosen.nidn, dosen.nama_dosen, dosen.kode_prodi, dosen.email_dosen, prodi.nama_prodi 
		FROM dosen JOIN prodi ON dosen.kode_prodi = prodi.kode_prodi');
		return $query;
	}

	function get_dosen_by_ajax($where)
	{
		$query = $this->db->get_where('dosen', $where);

		foreach ($query->result() as $data) {
			$output = array('email' => $data->email_dosen);
		}

		return $output;
	}
}
