<?php
class Barang extends CI_Controller
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
    public function delete($id)
    {
        $this->Barang_model->delete($id);
        redirect('dashboard/admin/home/listBarang');
    }
}
