<?php
class Lelang extends CI_Controller
{
    private $data;
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
        // die;
        $this->data['title'] = "Tambah Lelang";
        $this->load->view('dashboard/templates/masyarakat/header', $this->data);
        $this->load->view('dashboard/masyarakat/lelang/tambahLelang', $this->data);
        $this->load->view('dashboard/templates/masyarakat/footer');
    }
    public function listLelangUser()
    {
        $this->data['title'] = "List Lelang Anda";
        $this->data['lelang'] = $this->Lelang_model->getByUser($_SESSION['id']);
        $this->load->view('dashboard/templates/masyarakat/header', $this->data);
        $this->load->view('dashboard/masyarakat/lelang/listLelang', $this->data);
        $this->load->view('dashboard/templates/masyarakat/footer');
    }
}
