<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Jadwal', 'M_Dosen', 'M_Matkul', 'M_Mahasiswa'));
    }

    function index()
    {
        $data['jadwal'] = $this->M_Jadwal->tampilkan_record()->result();
        $this->load->view('v_lihat_jadwal_dosen.php', $data);
    }

    function tambah_data()
    {
        $data['dosen'] = $this->M_Dosen->tampilkan_record()->result();
        $data['matkul'] = $this->M_Matkul->tampilkan_record()->result();
        $this->load->view('v_input_jadwal_dosen.php', $data);
    }

    function insert_data()
    {
        $tangkapNidn = $this->input->post('nidn');
        $tangkapMatkul = $this->input->post('kode_matkul');
        $tangkapEmailDosen = $this->input->post('email');

        $data = array(
            'nidn' => $tangkapNidn,
            'kode_matkul' => $tangkapMatkul
        );

        $this->M_Jadwal->insert_record($data, 'jadwal');

        $this->load->library('Phpmailer_lib');

        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->Port       = 587;                   // SMTP port to connect to GMail
        $mail->Username   = "danthonynathanael@gmail.com";  // alamat email kamu
        $mail->Password   = "Elemagik4";            // password GMail
        $mail->setFrom('danthonynathanael@gmail.com', 'David'); //email alias
        $mail->addAddress($tangkapEmailDosen);     // Add a recipient
        $mail->Subject = 'Hallo';                    // Email subject
        $mail->Body       = 'Selamat Input Jadwal Anda berhasil ';                    // Set email Body

        if (!$mail->Send()) {
            echo "Eror: " . $mail->ErrorInfo;
        } else {
            redirect('jadwal/index');
        }
    }

    function getDosenByAjax()
    {
        $nidn = $this->input->post('nidn');
        $where = array('nidn' => $nidn);
        $data = $this->M_Dosen->get_dosen_by_ajax($where);
        echo json_encode($data);
    }

    function getSksByAjax()
    {
        $id = $this->input->post('kode_matkul');
        $where = array('kode_matkul' => $id);
        $data = $this->M_Matkul->get_sks_by_ajax($where);
        echo json_encode($data);
    }

    function getMahasiswaByAjax()
    {
        $id = $this->input->post('npm');
        $where = array('npm' => $id);
        $data = $this->M_Mahasiswa->get_mahasiswa_by_ajax($where);
        echo json_encode($data);
    }
}
