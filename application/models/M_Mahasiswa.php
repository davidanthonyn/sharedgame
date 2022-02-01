<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model
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

		$query = $this->db->query('SELECT * FROM mahasiswa');
		return $query;
	}*/

	public function tampilkan_record()
	{
		$query = $this->db->query('SELECT mahasiswa.npm, mahasiswa.nama_mahasiswa, mahasiswa.email_mahasiswa, mahasiswa.kode_prodi,
		prodi.nama_prodi FROM mahasiswa JOIN prodi ON mahasiswa.kode_prodi = prodi.kode_prodi');

		return $query;
	}

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



	function get_mahasiswa_by_ajax($where)
	{
		$query = $this->db->get_where('mahasiswa', $where);

		foreach ($query->result() as $data) {
			$output = array('email' => $data->email_mahasiswa);
		}

		return $output;
	}
}
