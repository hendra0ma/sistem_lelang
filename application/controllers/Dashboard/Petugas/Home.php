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
        if (!$this->session->userdata('autentikasi') || $this->session->userdata('level') != 3) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect('auth/auth/login');
        }
    }


    public function index()
    {

        $this->load->view('dashboard/templates/petugas/header');
        $this->load->view('dashboard/petugas/index');
        $this->load->view('dashboard/templates/petugas/footer');
    }
}
