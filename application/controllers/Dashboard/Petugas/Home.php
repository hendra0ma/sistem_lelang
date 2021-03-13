<?php
class Home extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
        $this->data['petugas'] = $this->Petugas_model->getUserByUsername($_SESSION['username']);
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

        $this->data['title'] = "Dashboard petugas";
        $this->data['jumlah_barang'] = $this->Barang_model->getCount();
        $this->data['jumlah_lelang'] = $this->Lelang_model->getCount();
        $this->data['jumlah_user'] = $this->User_model->getCount();
        $this->data['barang'] = $this->Barang_model->getBarangLimit(5);
        $this->load->view('dashboard/templates/petugas/header', $this->data);
        $this->load->view('dashboard/petugas/index', $this->data);
        $this->load->view('dashboard/templates/petugas/footer');
    }


    public function listBarang()
    {
        $this->data['barang'] = $this->Barang_model->getBarang();
        $this->data['title'] = "List Barang";
        $this->load->view('dashboard/templates/petugas/header', $this->data);
        $this->load->view('dashboard/petugas/listBarang', $this->data);
        $this->load->view('dashboard/templates/petugas/footer');
    }
}
