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
        if (!$this->session->userdata('autentikasi') || $this->session->userdata('level') != 2) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect('auth/auth/login');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard Admin";
        $data['jumlah_barang'] = $this->Barang_model->getCount();
        $data['jumlah_petugas'] = $this->Petugas_model->getCount();
        $this->load->view('dashboard/templates/admin/header', $data);
        $this->load->view('dashboard/admin/index', $data);
        $this->load->view('dashboard/templates/admin/footer');
    }
    public function listBarang()
    {
        $data['title'] = "Atur Petugas";
        $this->load->view('dashboard/templates/admin/header', $data);
        $this->load->view('dashboard/admin/listBarang', $data);
        $this->load->view('dashboard/templates/admin/footer');
    }
}
