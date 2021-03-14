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
        $this->data['pemenang'] = $this->getPemenang($this->data['user']->id_user)->num_rows();
        // var_dump($this->data['pemenang']);
        // die;
        $this->data['title'] = "Dashboard Pelelangan";
        $this->data['jumlah_barang'] = $this->Barang_model->getCount();
        $this->data['jumlah_lelang_user'] = count($this->Lelang_model->getByUser($_SESSION['id']));
        $this->data['title'] = "Dashboard User";
        $this->load->view('dashboard/templates/masyarakat/header', $this->data);
        $this->load->view('dashboard/masyarakat/index', $this->data);
        $this->load->view('dashboard/templates/masyarakat/footer');
    }
    private function getPemenang($id)
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_lelang.id_barang');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.id_user = tb_barang.id_user');
        $this->db->where('tb_lelang.user_bid', $id);
        $this->db->where('tb_lelang.status', "ditutup");
        return $this->db->get();
    }
    public function listDataMenang()
    {
        $this->data['title'] = "Dashboard Pelelangan";
        $this->data['pemenang'] = $this->getPemenang($this->data['user']->id_user)->result();
        $this->load->view('dashboard/templates/masyarakat/header', $this->data);
        $this->load->view('dashboard/masyarakat/listDataMenang', $this->data);
        $this->load->view('dashboard/templates/masyarakat/footer');
    }
}
