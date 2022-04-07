<?php

class M_User extends CI_model
{
    public function getAllUser()
    {
        $query = $this->db->query('SELECT * FROM user JOIN user_role ON user_role.id_role = user.id_role');
        return $query;
    }

    public function tambahDataCustomer()
    {
        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $email = $this->input->post('email', true);

        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'alamat_lengkap' => "",
            'no_hp' => "",
            'no_hp_dua' => "",
            'tgl_lahir' => "0000-00-00",
            'id_role' => 3,
            'is_active' => "not_yet_activated",
            'created_at' => $now,
            'updated_at' => $now
        ];

        //Kirim ke tabel user
        $this->db->insert('user', $data);
    }

    public function editDataUser()
    {
        $name = $this->input->post('fullname');
        $email = $this->input->post('email', true);
        $mobilenumber = $this->input->post('mobilenumber');
        $mobilenumbertwo = $this->input->post('mobilenumbertwo');
        $dob = $this->input->post('dob');
        $address = $this->input->post('address');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekktp = $data['user']['fotoktp'];
        $cekselfiektp = $data['user']['selfie_foto_ktp'];
        $cekstatusktp = $data['user']['status_ktp'];

        //Memvalidasi ktp dan selfie terlebih dahulu, sebelum mengambil file dari POST
        if ($cekktp == 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Cek jika ada gambar yang akan diupload
            $upload_ktp = $_FILES['ktp']['name'];
            $upload_selfie_ktp = $_FILES['selfiektp']['name'];
        } else if ($cekktp == 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
            //Cek jika ada gambar yang akan diupload
            $upload_ktp = $_FILES['ktp']['name'];
        } else if ($cekktp != 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Cek jika ada gambar yang akan diupload
            $upload_selfie_ktp = $_FILES['selfiektp']['name'];
        } else if ($cekktp != 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
        }

        if ($upload_ktp) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '5120';
            $config['upload_path']     = './assets/img/ktp/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ktp')) {
                //Jika upload ktp berhasil
                $new_image_ktp = $this->upload->data('file_name');
                $this->db->set('foto_ktp', $new_image_ktp);
            } else {
                //Jika upload ktp gagal
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Upload KTP anda gagal.</div>');
            }
        }

        if ($upload_selfie_ktp) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '5120';
            $config['upload_path']     = './assets/img/selfiektp/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('selfiektp')) {
                //Jika upload ktp berhasil
                $new_image_selfie_ktp = $this->upload->data('file_name');
                $this->db->set('foto_selfie_ktp', $new_image_selfie_ktp);
            } else {
                //Jika upload ktp gagal
                $this->session->set_flashdata('datausermessage', '<div class="alert alert-warning" role="alert" style="text-align:center;">Upload Selfie KTP anda gagal.</div>');
            }
        }

        //Mengecek kembali, apakah user telah mengupload ktp, serta selfie ktp juga
        if ($cekktp != 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'sedang_verifikasi');
        } else if ($cekktp == 'emptyktp.png' && $cekselfiektp != 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'selfie_ktp_saja');
        } else if ($cekktp != 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'ktp_saja');
        } else if ($cekktp == 'emptyktp.png' && $cekselfiektp == 'emptyselfiektp.png') {
            //Kedua dokumen telah diupload
            $this->db->set('status_ktp', 'belum');
        }

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $this->db->set('nama_lengkap', $name);
        $this->db->set('no_hp', $mobilenumber);
        $this->db->set('no_hp_dua', $mobilenumbertwo);
        $this->db->set('tgl_lahir', $dob);
        $this->db->set('alamat_lengkap', $address);
        $this->db->set('updated_at', $now);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function tambahUserTokenVerify()
    {
        $email = $this->input->post('email', true);

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        //Siapkan token untuk aktivasi akun
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'time_created' => $now
        ];

        //Kirim ke tabel user token
        $this->db->insert('usertoken', $user_token);
        $this->_sendEmail($token, 'verify');
    }

    public function tambahUserTokenForgot()
    {
        $email = $this->input->post('email', true);

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        //Siapkan token untuk aktivasi akun
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'time_created' => $now
        ];

        //Kirim ke tabel user token
        $this->db->insert('usertoken', $user_token);
        $this->_sendEmail($token, 'forgot');
    }

    public function tambahUserTokenChange()
    {
        $emailbaru = $this->input->post('newemail');

        //Set waktu untuk created at dan updated at
        $timezone = date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        //Siapkan token untuk aktivasi akun
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $emailbaru,
            'token' => $token,
            'time_created' => $now
        ];

        //Kirim ke tabel user token
        $this->db->insert('usertoken', $user_token);
        $this->_sendEmail($token, 'change');
    }

    private function _sendEmail($token, $type)
    {
        $email = $this->input->post('email', true);

        //Config gmail
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'sharedgametech@gmail.com',
            'smtp_pass' => 'sukamaingame',
            'smtp_port' => 465,
            //'mail_type' => 'html',
            'charset' => 'iso-8859-1'
        ];


        /*
        //Config 000WebHost
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ns02.000webhost.com',
            'smtp_user' => 'noreply@sharedgame.tech',
            'smtp_pass' => 'qmSgTyH6',
            'smtp_port' => 587,
            'mail_type' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        */

        $this->load->library('email');
        $this->load->model('M_CustomerService');
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $this->email->from('noreply@sharedgame.tech', 'SharedGame | Do Not Reply');

        //$this->email->to('kontolbinatang@protonmail.com');

        $this->email->to($email);

        //Jika tipe nya adalah verifikasi akun
        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun | SharedGame');

            //$this->email->message('Klik link berikut untuk memverifikasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Aktivasi Akun</a>');
            $data['email'] = $email;
            $data['token'] = $token;
            //Model M_CustomerService pada fungsi index(panggil data CS dari database)
            $data['cs'] = $this->M_CustomerService->index()->result();
            $message = $this->load->view('emailtemplates/confirm_account.php', $data, TRUE);
            $this->email->message($message);

            //$this->email->message('<html><head></head><body>Klik link berikut untuk memverifikasi akun anda : 
            //<a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . $token . '">Aktivasi Akun</a></body><html>');
        } else if ($type == 'forgot') {
            //Jika tipe nya lupa password
            $this->email->subject('Reset Password | SharedGame');
            $data['email'] = $email;
            $data['token'] = $token;
            //Model M_CustomerService pada fungsi index(panggil data CS dari database)
            $data['cs'] = $this->M_CustomerService->index()->result();
            $message = $this->load->view('emailtemplates/forgot_password.php', $data, TRUE);
            $this->email->message($message);

            //$this->email->message('Klik link berikut untuk mereset password Anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a>');
        } else if ($type == 'change') {
            //Jika tipe nya lupa password
            $this->email->subject('Ganti Email | SharedGame');
            $data['email'] = $email;
            $data['token'] = $token;
            //Model M_CustomerService pada fungsi index(panggil data CS dari database)
            $data['cs'] = $this->M_CustomerService->index()->result();
            $message = $this->load->view('emailtemplates/change_email.php', $data, TRUE);
            $this->email->message($message);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    function get_admin_by_ajax()
    {
        //$query = $this->db->get_where('user');
        $query = $this->db->select('SELECT id_user, nama_lengkap, email, is_active FROM user WHERE id_role = 1', FALSE);

        foreach ($query->result() as $data) {
            $output = array(
                'id_user' => $data->id_user,
                'nama_lengkap' => $data->nama_lengkap,
                'email' => $data->email,
                'is_active' => $data->is_active
            );
        }

        return $output;
    }

    function get_karyawan_by_ajax()
    {
        //$query = $this->db->get_where('user');
        $query = $this->db->select('SELECT id_user, nama_lengkap, email, is_active FROM user WHERE id_role = 2', FALSE);

        foreach ($query->result() as $data) {
            $output = array(
                'id_user' => $data->id_user,
                'nama_lengkap' => $data->nama_lengkap,
                'email' => $data->email,
                'is_active' => $data->is_active
            );
        }

        return $output;
    }

    function get_customer_by_ajax()
    {
        //$query = $this->db->get_where('user');
        $query = $this->db->select('SELECT id_user, nama_lengkap, email, alamat_lengkap, no_hp, no_hp_dua, tgl_lahir, foto_ktp, foto_selfie_ktp, status_ktp, is_active, created_at,updated_at FROM user WHERE id_role = 3', FALSE);

        foreach ($query->result() as $data) {
            $output = array(
                'id_user' => $data->id_user,
                'nama_lengkap' => $data->nama_lengkap,
                'email' => $data->email,
                'alamat_lengkap' => $data->alamat_lengkap,
                'no_hp' => $data->no_hp,
                'no_hp' => $data->no_hp_dua,
                'tgl_lahir' => $data->tgl_lahir,
                'foto_ktp' => $data->foto_ktp,
                'foto_selfie_ktp' => $data->foto_selfie_ktp,
                'status_ktp' => $data->status_ktp,
                'is_active' => $data->is_active,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at
            );
        }

        return $output;
    }

    function get_member_by_ajax()
    {
        $query = $this->db->get_where('pages');

        foreach ($query->result() as $data) {
            $output = array(
                //'page_name' => $data->page_name,
                'detail' => $data->detail
            );
        }
        return $output;
    }

    function get_subsletter_by_ajax()
    {
        $query = $this->db->get_where('newsletter');

        foreach ($query->result() as $data) {
            $output = array(
                'id_newsletter' => $data->id_newsletter,
                'email' => $data->email,
                'is_active' => $data->is_active,
                'joined_at' => $data->last_updated_at,
            );
        }
        return $output;
    }
    public function getAllCS()
    {
        $query = $this->db->query('SELECT * FROM customerservice');
        return $query;


        return $this->db->get('customerservice')->result_array();
    }

    function fetch_state($country_id)
    {
        $this->db->where('country_id', $country_id);
        $this->db->order_by('state_name', 'ASC');
        $query = $this->db->get('state');
        $output = '<option value="">Select State</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->state_id . '">' . $row->state_name . '</option>';
        }
        return $output;
    }
}
