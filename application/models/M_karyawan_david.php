<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan_david extends CI_Model {

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

	function tampilkan_record() {
		/*$query = $this->db->query('SELECT karyawan.nik, karyawan.nama_karyawan, karyawan.no_hp, karyawan.jenis_kelamin, karyawan.id_jabatan 
		FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan');*/

		$query = $this->db->query('SELECT karyawan.nik, karyawan.nama_karyawan, karyawan.no_hp, karyawan.jenis_kelamin, jabatan.nama_jabatan 
		FROM karyawan,jabatan WHERE karyawan.id_jabatan=jabatan.id_jabatan');

		return $query;
	}
	
}