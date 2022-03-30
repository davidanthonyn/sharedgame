<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Brand');
        $this->load->model('M_CustomerService');
        //$this->load->model('M_Page');
        $this->load->model('M_Page');
        $this->load->model('M_User');
        $this->load->model('Modelproduk');
        $this->load->library('form_validation');
        $this->load->library('session');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['id_role'] == '3') {
            redirect('');
        }
    }
    /*
    CONTENTS
    1. index()
    2. manage_page()
    3. get_pages_by_ajax()
    4. manage_contact()
    5. tambahbrand()
    6. kelolabrand()
    7. proses_edit_data_brand()
    8. delete_data_brand($id_brand)
    9. tambahproduk
    10. kelolaproduk

    */

    function index()
    {
        //Load database
        $this->load->database();

        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            //Title Dashboard Admin saat halaman dibuka
            $data['title'] = 'Dashboard Admin | SharedGame';
        } else if ($data['user']['id_role'] == '2') {
            //Title Dashboard Karyawan saat halaman dibuka
            $data['title'] = 'Dashboard Karyawan | SharedGame';
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
        }

        //Menghitung row customer melalui model M_Admin
        $data['jumlahcustomer'] = $this->M_Admin->getRowCustomer();

        //Menghitung row brand melalui model M_Admin
        $data['jumlahbrand'] = $this->M_Admin->getRowBrand();

        //Menghitung row produk melalui model M_Admin
        $data['jumlahproduct'] = $this->M_Admin->getRowProduct();

        //Menghitung row booking melalui model M_Admin
        $data['jumlahbooking'] = $this->M_Admin->getRowBooking();

        //Menghitung row subscriber aktif melalui model M_Admin
        $data['jumlahsubs'] = $this->M_Admin->getRowSubs();

        //Menghitung row customer service melalui model M_Admin
        $data['jumlahcustomerservice'] = $this->M_Admin->getRowCustomerService();

        $this->load->view('admin/dashboard.php', $data);
    }

    function manage_page()
    {
        //$data['about'] = $this->M_Page->tampilkan_about_us()->result();
        //$data['faq'] = $this->M_Page->tampilkan_faq()->result();
        //$data['privacy'] = $this->M_Page->tampilkan_privacy()->result();
        //$data['terms'] = $this->M_Page->tampilkan_terms()->result();

        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '2') {
            //Title Dashboard Admin saat halaman dibuka
            $this->session->set_flashdata('messagefailed', 'Fitur About / FAQ / Privacy / Terms hanya bisa diakses oleh admin!');
            redirect('admin');
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
        }


        $tangkapId = $this->input->post('id_page');
        $tangkapDetail = $this->input->post('detail');

        $this->form_validation->set_rules('detail', 'Detail Page', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kelola Halaman | SharedGame';
            $data['smalltitle'] = 'Ubah Halaman';
            $data['page'] = $this->M_Page->tampilkan_halaman()->result();
            $this->load->view('admin/manage-pages.php', $data);
        } else if ($tangkapId == '-- Pilih Halaman --') {
            $this->session->set_flashdata('messagefailed', 'Pilih halaman yang ingin diubah!');
            redirect('admin/kelolahalamanlain');
        } else {
            $data = array(
                'detail' => $tangkapDetail
            );

            $where = array(
                'id_page' => $tangkapId
            );

            $edit = $this->M_Page->update_record($where, $data, 'pages');

            $this->session->set_flashdata('messagesuccess', 'Halaman berhasil diedit');
            redirect('admin/manage_page');

            /*
            if ($edit == true) {
                $this->session->set_flashdata('messagesuccess', 'Halaman berhasil diedit');
                redirect('admin/manage_page');
            } else {
                $this->session->set_flashdata('messagefailed', 'Halaman gagal diedit');
                redirect('admin/manage_page');
            }*/
        }
    }

    function getPagesByAjax()
    {
        $id_page = $this->input->post('id_page');
        $where = array('id_page' => $id_page);
        //$where = array('id_page' => 1);
        $data = $this->M_Page->get_pages_by_ajax($where);
        echo json_encode($data);
    }

    function manage_contact()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '2') {
            //Title Dashboard Admin saat halaman dibuka
            $this->session->set_flashdata('messagefailed', 'Fitur Contact hanya bisa diakses oleh admin!');
            redirect('admin');
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
        }

        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Contact Info | SharedGame';
            $data['smalltitle'] = 'Ubah Kontak';

            $data['contact'] = $this->M_CustomerService->index()->result();
            $this->load->view('admin/update-contactinfo.php', $data);
        } else {
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $contactno = $this->input->post('contactno');

            //Set waktu untuk created at dan updated at
            $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');

            $this->db->set('nama_lengkap', $address);
            $this->db->set('email_cs', $email);
            $this->db->set('number_cs', $contactno);
            $this->db->set('created_at', $now);
            $this->db->where('id_cs', 1);
            $this->db->update('customerservice');

            //Alert akun berhasil diaktivasi
            $this->session->set_flashdata('message', 'Edit Contact Info berhasil');
            redirect('admin/manage_contact');
        }
    }

    public function tambahbrand()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '2') {
            //Title Dashboard Admin saat halaman dibuka
            $this->session->set_flashdata('messagefailed', 'Fitur Tambah Brand hanya bisa diakses oleh admin!');
            redirect('admin');
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
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
                $config['upload_path']     = './assets/img/brandlogo/';

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
                    redirect('admin/tambahbrand');
                } else {
                    //Jika upload brand gagal
                    $this->session->set_flashdata('message_error', 'Brand gagal ditambahkan');
                    redirect('admin/tambahbrand');
                }
            }
        }
    }

    public function kelolabrand()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            $data['title'] = 'Kelola Brand | SharedGame';
            $data['smalltitle'] = 'Daftar Brand';
            $data['brand'] = $this->M_Brand->getAllBrand()->result();
            $this->load->view('admin/manage-brands', $data);
        } else if ($data['user']['id_role'] == '2') {
            //Title Dashboard Admin saat halaman dibuka
            $this->session->set_flashdata('messagefailed', 'Fitur Kelola Brand hanya bisa diakses oleh admin!');
            redirect('admin');
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
        }
    }

    function edit_data_brand($id_brand)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '3') {
            redirect('');
        }

        $this->form_validation->set_rules('brand', 'text', 'trim|required', [
            'required' => 'Brand harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Brand | SharedGame';
            $where = array('id_brand' => $id_brand);
            $data['brandEdit'] = $this->M_Brand->edit_record('brand', $where)->result();
            $data['status'] = $this->M_Brand->getAllBrand()->result();
            $this->load->view('admin/edit-brand', $data);
        } else {
            $id = $this->input->post('idbrand');
            $brand = $this->input->post('brand');
            $status = $this->input->post('status');

            //Cek jika ada gambar brand yang diupload
            $reupload_logo = $_FILES['rebrandlogo']['name'];

            //If user upload logo ulang
            if (!empty($reupload_logo)) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5120';
                $config['upload_path']     = './assets/img/brandlogo/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('rebrandlogo')) {
                    $data['brand'] = $this->db->get_where('brand', ['id_brand' => $id])->row_array();
                    $old_image = $data['brand']['gambar_brand'];

                    if ($old_image != "") {
                        unlink(FCPATH . 'assets/img/brandlogo/' . $old_image);
                    }

                    //Jika upload logo rebrand berhasil
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_brand', $new_image);
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
            redirect('admin/kelolabrand');
        }
    }

    function proses_edit_data_brand()
    {
        $this->form_validation->set_rules('brand', 'text', 'trim|required', [
            'required' => 'Brand harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Brand | SharedGame';
            $where = array('id_brand' => $id_brand);
            $data['brandEdit'] = $this->M_Brand->edit_record('brand', $where)->result();
            $data['status'] = $this->M_Brand->getAllBrand()->result();
            $this->load->view('admin/edit-brand', $data);
        } else {
            $id = $this->input->post('idbrand');
            $brand = $this->input->post('brand');
            $status = $this->input->post('status');

            //Cek jika ada gambar brand yang diupload
            $reupload_logo = $_FILES['rebrandlogo']['name'];

            //If user upload logo ulang
            if (!empty($reupload_logo)) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '5120';
                $config['upload_path']     = './assets/img/brandlogo/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('rebrandlogo')) {
                    $data['brand'] = $this->db->get_where('brand', ['id_brand' => $id])->row_array();
                    $old_image = $data['brand']['gambar_brand'];

                    if ($old_image != "") {
                        unlink(FCPATH . 'assets/img/brandlogo/' . $old_image);
                    }

                    //Jika upload logo rebrand berhasil
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_brand', $new_image);
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
            redirect('admin/kelolabrand');
        }
    }

    function delete_data_brand($id_brand)
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
        if ($data['user']['id_role'] == '1') {
            $where = array('id_brand' => $id_brand);
            $this->M_Brand->delete_record($where, 'brand');
            redirect('admin/kelolabrand');
        } else {
            redirect('');
        }
    }

    function kelolaproduk()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '2') {
            //Title Dashboard Admin saat halaman dibuka
            $this->session->set_flashdata('messagefailed', 'Fitur Kelola Produk hanya bisa diakses oleh admin!');
            redirect('admin');
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
        }

        $data['title'] = 'Kelola Produk | SharedGame';
        $data['smalltitle'] = 'Daftar Produk';
        $data['product'] = $this->Modelproduk->getAllRowProducts()->result();
        $this->load->view('admin/manage-products.php', $data);



        //Title Dashboard Admin saat halaman dibuka
        $this->session->set_flashdata('messagefailed', 'Fitur Kelola User hanya bisa diakses oleh admin!');
    }

    //contoh
    /*
    function getBrandByAjax()
    {
        $brand = $this->input->post('brand');
        $where = array('brand' => $brand);
        $data = $this->M_Brand->get_dosen_by_ajax($where);
        echo json_encode($data);
    }*/

    function tambahproduk()
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
            $data['title'] = 'Add Product | SharedGame';
            $data['smalltitle'] = 'Basic Info';
            $data['brand'] = $this->M_Brand->getAllBrand()->result();
            $data['icon'] = '<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameSettings.png">';

            $this->load->view('admin/post-aproduct.php', $data);
        } else {
            $nama_produk = $this->input->post('productname');
            $id_brand = $this->input->post('id_brand');
            $deskripsi = $this->input->post('deskripsi');
            $satuhari = $this->input->post('priceperday');
            $tigahari = $this->input->post('price3days');
            $tujuhhari = $this->input->post('price7days');
            $gametype = $this->input->post('gametype');
            $serialproduk = $this->input->post('serialnumber');
            $avail = $this->input->post('stock');
            $color = $this->input->post('favcolor');
            $img = $this->input->post('img');

            //Set waktu untuk created at dan updated at
            $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');

            $data = array(
                'nama_produk' => $nama_produk,
                'id_brand' => $id_brand,
                'deskripsi_produk' => $deskripsi,
                'kategori_produk' => $gametype,
                'serial_produk' => $serialproduk,
                'jumlah_tersedia' => $avail,
                'warna_produk' => $color,
                'gambar_produk' => $img
            );

            //Memasukkan data produk ke tabel
            $this->db->insert('produk', $data);

            //Mengambil insert id, untuk taruh data di tabel tarifsewa
            $insertId = $this->db->insert_id();

            $hargasatuhari = array(
                'id_produk' => $insertId,
                'tarif_harga' => $satuhari,
                'lama_sewa_hari' => '1',
                'updated_at' => $now
            );

            $hargatigahari = array(
                'id_produk' => $insertId,
                'tarif_harga' => $tigahari,
                'lama_sewa_hari' => '3',
                'updated_at' => $now
            );

            $hargatujuhhari = array(
                'id_produk' => $insertId,
                'tarif_harga' => $tujuhhari,
                'lama_sewa_hari' => '7',
                'updated_at' => $now
            );

            //Memasukkan data tarifsewa
            $this->db->insert('tarifsewa', $hargasatuhari);
            $this->db->insert('tarifsewa', $hargatigahari);
            $this->db->insert('tarifsewa', $hargatujuhhari);

            //$this->Modelproduk->insert_record($data, 'produk');

            //Title Dashboard Admin saat halaman dibuka
            $this->session->set_flashdata('message', 'Tambah produk berhasil!');
            redirect('admin/kelolaproduk');
        }
    }

    function kelolaUser()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '2') {
            //Title Dashboard Admin saat halaman dibuka
            $this->session->set_flashdata('messagefailed', 'Fitur Kelola User hanya bisa diakses oleh admin!');
            redirect('admin');
        } else if ($data['user']['id_role'] == '3') {
            redirect('');
        }

        $data['title'] = 'Kelola User | SharedGame';
        $data['smalltitle'] = 'Daftar User';
        $data['user'] = $this->M_User->getAllUser()->result();
        $this->load->view('admin/reg-users.php', $data);
    }

    function getAdminByAjax()
    {
        $id_page = $this->input->post('id_page');
        $where = array('id_page' => $id_page);
        //$where = array('id_page' => 1);
        $data = $this->M_User->get_admin_by_ajax($where);
        echo json_encode($data);
    }

    function getCustomerByAjax()
    {
        $id_page = $this->input->post('id_page');
        $where = array('id_page' => $id_page);
        //$where = array('id_page' => 1);
        $data = $this->M_User->get_customer_by_ajax($where);
        echo json_encode($data);
    }

    function getMembershipByAjax()
    {
        $id_page = $this->input->post('id_page');
        $where = array('id_page' => $id_page);
        //$where = array('id_page' => 1);
        $data = $this->M_User->get_member_by_ajax($where);
        echo json_encode($data);
    }

    function getNewsletterByAjax()
    {
        $id_page = $this->input->post('id_page');
        $where = array('id_page' => $id_page);
        //$where = array('id_page' => 1);
        $data = $this->M_User->get_subsletter_by_ajax($where);
        echo json_encode($data);
    }

    function managecs()
    {
        if (!$this->session->userdata('email')) {
            redirect('');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        if ($data['user']['id_role'] == '1') {
            $data['title'] = 'Kelola Customer Service | SharedGame';
            $data['smalltitle'] = 'Daftar Kritik/Saran';
            $data['cs'] = $this->M_CustomerService->tampilkanDataCS()->result();
            $this->load->view('admin/manage-contactusquery.php', $data);
        } else {
            redirect('');
        }
    }
}
