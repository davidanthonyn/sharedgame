<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Page extends CI_Model
{
	function tampilkan_about_us()
	{
		$query = $this->db->query('SELECT * FROM pages WHERE id_page = 1');
		return $query;
	}

	function contact_info()
	{
		$query = $this->db->query('SELECT dosen.nidn, dosen.nama_dosen, dosen.kode_prodi, dosen.email_dosen, prodi.nama_prodi 
		FROM pages JOIN prodi ON dosen.kode_prodi = prodi.kode_prodi');
		return $query;
	}

	function tampilkan_faq()
	{
		$query = $this->db->query('SELECT * FROM pages WHERE id_page = 2');
		return $query;
	}

	function tampilkan_privacy()
	{
		$query = $this->db->query('SELECT * FROM pages WHERE id_page = 3');
		return $query;
	}

	function tampilkan_terms()
	{
		$query = $this->db->query('SELECT * FROM pages WHERE id_page = 4');
		return $query;
	}

	public function tampilkan_halaman()
	{

		$query = $this->db->query('SELECT * FROM pages');
		return $query;
	}

	function get_pages_by_ajax($where)
	{
		$query = $this->db->get_where('pages', $where);

		foreach ($query->result() as $data) {
			$output = array(
				//'page_name' => $data->page_name,
				'detail' => $data->detail
			);
		}
		return $output;
	}

	function update_record($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function getAllRowPages()
	{
		$query = $this->db->query('SELECT * FROM pages');
		return $query;
	}

	public function GetProdukById($id)
	{
		$data = $this->db->query("SELECT * FROM pages WHERE 'type'' = '$type'");
		return $data->result_array();
	}
}
