<?php
class Home extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->data['admin'] = $this->Admin_model->getUserByUsername($_SESSION['username']);
    }

    private function authenticated()
    {
        if (!$this->session->userdata('autentikasi') || $this->session->userdata('level') != 2) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect('auth/auth/login');
        }
    }

    public function index()
    {
        $this->data['title'] = "Dashboard Admin";
        $this->data['jumlah_barang'] = $this->Barang_model->getCount();
        $this->data['jumlah_petugas'] = $this->Petugas_model->getCount();


        $this->load->view('dashboard/templates/admin/header', $this->data);
        $this->load->view('dashboard/admin/index', $this->data);
        $this->load->view('dashboard/templates/admin/footer');
    }
    public function listBarang()
    {
        $this->data['title'] = "Atur Petugas";
        $this->load->view('dashboard/templates/admin/header', $this->data);
        $this->load->view('dashboard/admin/listBarang', $this->data);
        $this->load->view('dashboard/templates/admin/footer');
    }
}
