<?php
class M_Jadwal extends CI_Model {

    function tampilkan_record() {
        return $this->db->query('
        SELECT
            jadwal.kode_jadwal,
            dosen.nidn,dosen.nama_dosen,
            matkul.kode_matkul,
            matkul.nama_matkul,
            prodi.nama_prodi
            FROM jadwal 
            JOIN dosen 
            ON jadwal.nidn = dosen.nidn 
            JOIN matkul 
            ON jadwal.kode_matkul = matkul.kode_matkul 
            JOIN prodi 
            ON dosen.kode_prodi = prodi.kode_prodi');
    }

    function insert_record($data,$table){
        $this->db->insert($table,$data);
    }
}