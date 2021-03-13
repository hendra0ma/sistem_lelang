<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->data['user'] = $this->User_model->getUserByUsername($_SESSION['username']);
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
        $this->data['title'] = "Dashboard Pelelangan";
        $this->data['jumlah_barang'] = $this->Barang_model->getCount();
        $this->data['jumlah_lelang_user'] = count($this->Lelang_model->getByUser($_SESSION['id']));
        $this->data['title'] = "Dashboard User";
        $this->load->view('dashboard/templates/masyarakat/header', $this->data);
        $this->load->view('dashboard/masyarakat/index', $this->data);
        $this->load->view('dashboard/templates/masyarakat/footer');
    }
}
