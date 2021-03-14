<?php

class Export extends CI_Controller
{

    private $data;

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

    public function barang()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = uniqid() . "list-barang.pdf";
        $this->data['barang'] = $this->Barang_model->getBarang();
        $this->pdf->load_view('laporan/barang', $this->data);
    }
    public function lelang()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = uniqid() . "list-lelang.pdf";
        $this->data['lelang'] = $this->Lelang_model->getLelang();
        $this->pdf->load_view('laporan/lelang', $this->data);
    }
}
