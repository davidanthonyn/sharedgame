<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_CustomerService'));
        $this->load->library('form_validation');
        $this->load->model('M_Page');
    }

    function index()
    {
        //Model M_CustomerService pada fungsi index(panggil data CS dari database)
        $data['cs'] = $this->M_CustomerService->index()->result();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('emailaddress', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('phonenumber', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('kritik', 'Critics', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Contact Us | SharedGame';
            $this->load->view('includes/header.php', $data);
            $this->load->view('contact-us.php', $data);
            //$this->load->view('includes/footer.php', $data);
            $this->footer();
        } else {
            $name = htmlspecialchars($this->input->post('fullname', true));
            $email = htmlspecialchars($this->input->post('emailaddress', true));
            $phonenumber = htmlspecialchars($this->input->post('phonenumber', true));
            $kritik = htmlspecialchars($this->input->post('kritik', true));

            //Set waktu untuk created at dan updated at
            $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');

            //Jika nomor hp user(yang login) kosong
            if ($phonenumber == 'empty') {
                $this->session->set_flashdata('messagefailed', 'Mohon mengubah nomor telepon anda terlebih dahulu, pada Profile Settings ');
                redirect('contact');
            } else {
                $data = array(
                    'nama_lengkap' => $name,
                    'email_cs' => $email,
                    'number_cs' => $phonenumber,
                    'pesan_cs' => $kritik,
                    'created_at' => $now,
                    'status' => 'pending'
                );

                //Menjalankan model customer service untuk mengirim data ke tabel customerservice
                $this->M_CustomerService->insert_record('customerservice', $data);

                //Model M_CustomerService pada fungsi tambahDataCustomer
                //$tambahData = $this->M_CustomerService->tambahDataKeluhanCS();

                //$this->session->set_flashdata('messagefailed', 'Maaf, terjadi kesalahan pada sistem. Mohon coba lagi.');
                //redirect('contact');

                //Jalankan fungsi email kirim ke customer
                $this->_sendEmailToCustomer();

                $this->session->set_flashdata('messagesuccess', 'Terima kasih telah menghubungi kami. Kami akan segera menghubungi anda.');
                redirect('contact');
            }
        }
    }

    private function _sendEmailToCustomer()
    {
        $email = $this->input->post('email', true);

        //Config gmail
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://usvip4.noc401.com',
            'smtp_user' => 'noreply@sharedgame.tech',
            'smtp_pass' => 'Sukamaingam3!',
            'smtp_port' => 465,
            'mail_type' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('noreply@sharedgame.tech', 'SharedGame | Do Not Reply');

        $this->email->to($email);
    }

    public function footer()
    {
        $data['pages'] = $this->M_Page->getAllRowPages()->result();
        $this->load->view('includes/footer.php', $data);
    }
}
