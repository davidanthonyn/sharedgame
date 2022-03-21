<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //Model M_Brand pada fungsi tambahDataCustomer
        $this->load->model('M_Brand');
    }

    public function index()
    {
    }

    public function tambahbrand()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        $this->form_validation->set_rules('brand', 'text', 'trim|required', [
            'required' => 'Brand harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Brand | SharedGame';
            $data['icon'] = '<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameSettings.png">';

            $this->load->view('admin/create-brand', $data);
        } else {
            //Cek nama brand
            $brand = $this->input->post('brandlogo');

            //Cek jika ada gambar brand yang diupload
            $upload_logo = $_FILES['brandlogo']['name'];

            //Set waktu untuk created at dan updated at
            $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');

            //Pengecekan gambar upload & nama brand
            if ($brand && $upload_logo) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5120';
                $config['upload_path']     = './assets/brandlogo/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('brandlogo')) {
                    //Jika upload logo berhasil
                    $new_logo_brand = $this->upload->data('file_name');

                    $data = array(
                        'nama_brand' => $brand,
                        'gambar_brand' => $new_logo_brand,
                        'status_brand' => 'aktif',
                        'datetime_brand_added' => $now
                    );

                    //Menjalankan model brand untuk mengirim data ke tabel brand
                    $this->M_Brand->insert_record('brand', $data);

                    $this->session->set_flashdata('message', 'Brand berhasil ditambahkan');
                    redirect('brand/tambahbrand');
                } else {
                    //Jika upload brand gagal
                    $this->session->set_flashdata('message_error', 'Brand gagal ditambahkan');
                    redirect('brand/tambahbrand');
                }
            }
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
            $this->load->model('M_Brand');
            $data['title'] = 'Kelola Brand | SharedGame';
            $data['brand'] = $this->M_Brand->getAllBrand()->result();
            $this->load->view('admin/manage-brands', $data);
        } else {
            redirect('');
        }
    }

    function edit_data($id_brand)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            $this->load->model('M_Brand');
            $data['title'] = 'Edit Brand | SharedGame';
            $where = array('id_brand' => $id_brand);
            $data['brandEdit'] = $this->M_Brand->edit_record('brand', $where)->result();
            $data['status'] = $this->M_Brand->getAllBrand()->result();
            $this->load->view('admin/edit-brand', $data);
        } else {
            redirect('');
        }
    }

    function proses_edit_data()
    {
        $this->form_validation->set_rules('brand', 'text', 'trim|required', [
            'required' => 'Brand harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Brand | SharedGame';
            //Jika validasi salah
            $this->session->set_flashdata('message_error', 'Edit Brand Gagal.');
            redirect('brand/kelola');
        } else {
            $id = $this->input->post('idbrand');
            $brand = $this->input->post('brand');
            $status = $this->input->post('status');

            //Cek jika ada gambar brand yang diupload
            $reupload_logo = $_FILES['rebrandlogo']['name'];

            //If user upload logo ulang
            if ($reupload_logo) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5120';
                $config['upload_path']     = './assets/brandlogo/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('rebrandlogo')) {
                    //Jika upload logo rebrand berhasil
                    $new_rebrand_logo = $this->upload->data('file_name');
                    $this->db->set('gambar_brand', $new_rebrand_logo);
                    $this->db->where('id_brand', $id);
                    $this->db->update('brand');
                } else {
                    //Jika upload logo gagal
                    $this->session->set_flashdata('message_error', 'Upload Logo Gagal.');
                }
            }

            $data = array(
                'nama_brand' => $brand,
                'status_brand' => $status
            );

            $where = array(
                'id_brand' => $id
            );

            $this->M_Brand->update_record($where, $data, 'brand');
            redirect('Brand/kelola');
        }
    }

    function delete_data($id_brand)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
        if ($data['user']['id_role'] == '1') {
            $this->load->model('M_Brand');
            $where = array('id_brand' => $id_brand);
            $this->M_Brand->delete_record($where, 'brand');
            redirect('Brand/kelola');
        } else {
            redirect('');
        }
    }
}
