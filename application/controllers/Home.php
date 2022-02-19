<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['icon'] = '<?php echo base_url() . "assets/"; ?>images/SharedGameController.png';
        $data['title'] = 'SharedGame | The Best Rental Gaming Equipment';
        $data['bannerbig'] = 'FIND THE IDEAL GAME FOR YOU.';
        $data['bannersmall'] = 'We have more games for you to choose.';
        $data['boldfonttitle'] = 'Find the Best';
        $data['unboldfonttitle'] = 'Gaming Gear to Rent';
        $data['smallsentence'] = 'Apa yang kamu butuhkan untuk bermain game?
                                Kami menyediakan berbagai macam game untuk kamu.';
        $this->load->view('index.php', $data);
    }

    public function logout()
    {
        $this->load->view('logout.php');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function newsletter()
    {
        $this->load->view('newsletter.php');
    }
}
