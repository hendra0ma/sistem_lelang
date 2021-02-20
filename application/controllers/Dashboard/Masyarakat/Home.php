<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
    }
    private function authenticated()
    {
        if (!$this->session->userdata('autentikasi') || $this->session->userdata('level') != 1) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect('auth/auth/login');
        }
    }


    public function index()
    {

        $this->load->view('dashboard/templates/masyarakat/header');
        $this->load->view('dashboard/masyarakat/index');
        $this->load->view('dashboard/templates/masyarakat/footer');
    }
}
