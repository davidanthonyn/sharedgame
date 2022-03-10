<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library('form_validation');
    }

    public function index()
    {
    }

    function profile_settings()
    {
        $this->load->view('profile.php');
    }

    function my_booking()
    {
        $this->load->view('profile.php');
    }

    function post_testimonial()
    {
        $this->load->view('post-testimonial.php');
    }

    function manage_testimonial()
    {
        $this->load->view('my-testimonials.php');
    }

    public function edit()
    {
        if ($this->session->userdata('email')) {
        } else {
            redirect('');
        }

        $data['title'] = 'Edit Profile | SharedGame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php', $data);
            $this->load->view('profile.php', $data);
            $this->load->view('includes/footer.php', $data);
        } else {
            $name = $this->input->post('fullname');
            $email = $this->input->post('email');

            $this->db->set('nama_lengkap', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', 'Your profile has been updated!');

            //Redirect ke Login
            redirect('user/edit');
        }
    }

    public function processEdit()
    {
    }
}
