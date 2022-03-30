<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //Model M_Brand pada fungsi tambahDataCustomer
        $this->load->model('M_Rekening');
    }

    public function index()
    {
    }

    public function tambahrekening()
    {
        date_default_timezone_set("Asia/Jakarta");

        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $this->form_validation->set_rules('NamaBank', 'text', 'trim|required', [
            'required' => 'NamaBank harus diisi!'
        ]);

        $this->form_validation->set_rules('NoRekening', 'text', 'trim|required', [
            'required' => 'NoRekening harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Rekening | SharedGame';
            $data['icon'] = '<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameSettings.png">';

            $this->load->view('admin/create-rekening', $data);
        } else {
            //Cek nama rekening
            $namabank = $this->input->post('NamaBank');
            $norekening = $this->input->post('NoRekening');

            $data = array(
                'no_rekening_toko' => $norekening,
                'bank_rekening_toko' => $namabank,
                'status_rekening_toko' => 'aktif',
                'created_at' => date('Y-m-d H:i:s')
            );

            //Menjalankan model brand untuk mengirim data ke tabel brand
            $this->M_Rekening->insert_record('rekeningtoko', $data);

            $this->session->set_flashdata('message', 'Rekening berhasil ditambahkan');
            redirect('rekening/tambahrekening');
            

           
        }
    }

    public function kelola()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
      //      $this->load->model('M_Rekening');
            $data['title'] = 'Kelola Rekening | SharedGame';
            $data['rekening'] = $this->M_Rekening->AllRekening()->result();
            $this->load->view('admin/manage-rekening', $data);
        } else {
            redirect('');
        }
    }

    function edit_data($id_rekening)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            $this->load->model('M_Rekening');
            $data['title'] = 'Edit Rekening | SharedGame';
            $where = array('id_rekening_toko' => $id_rekening);
            $data['RekeningEdit'] = $this->M_Rekening->edit_record('rekeningtoko', $where)->result();
            $data['status'] = $this->M_Rekening->AllRekening()->result();
            $this->load->view('admin/edit-rekening', $data);
        } else {
            redirect('');
        }
    }

    function proses_edit_data()
    {
        $this->form_validation->set_rules('rekening', 'text', 'trim|required', [
            'required' => 'Rekening harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Rekening | SharedGame';
            //Jika validasi salah
            $this->session->set_flashdata('message_error', 'Edit Rekening Gagal.');
            redirect('rekening/kelola');
        } else {
            $id = $this->input->post('idrekening');
            $norekening = $this->input->post('no_rekening');
            $namabank = $this->input->post('rekening');
            $status = $this->input->post('status');

           

            $data = array(
                'no_rekening_toko' => $norekening,
                'bank_rekening_toko' => $namabank,
                'status_rekening_toko' => $status
            );

            $where = array(
                'id_rekening_toko' => $id
            );

            $this->M_Rekening->update_record($where, $data, 'rekeningtoko');
            redirect('Rekening/kelola');
        }
    }

    function delete_data($id_rekening)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
        if ($data['user']['id_role'] == '1') {
            $this->load->model('M_Rekening');
            $where = array('id_rekening_toko' => $id_rekening);
            $this->M_Rekening->delete_record($where, 'rekeningtoko');
            redirect('Rekening/kelola');
        } else {
            redirect('');
        }
    }
}