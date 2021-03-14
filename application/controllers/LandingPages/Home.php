<?php
class Home extends CI_Controller
{
    public function index()
    {
        $data['barang'] = $this->queryResult();
        $this->load->view('landing_pages/templates/header');
        $this->load->view('landing_pages/home/index', $data);
        $this->load->view('landing_pages/templates/footer');
    }
    public function listBarang()
    {
        $data['barang'] = $this->queryResult();
        $this->load->view('landing_pages/templates/header');
        $this->load->view('landing_pages/home/listBarang', $data);
        $this->load->view('landing_pages/templates/footer');
    }
    public function cariBarang()
    {
        $keyword = $_POST['keyword'];
        $data['barang'] = $this->querycari($keyword);
        $this->load->view('landing_pages/home/search', $data);
    }
    public function show($id)
    {
        $data['barang'] = $this->Lelang_model->getLelangByIdLanding($id);
        $this->load->view('landing_pages/templates/header');
        $this->load->view('landing_pages/home/checkout', $data);
        $this->load->view('landing_pages/templates/footer');
    }

    private function querycari($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where_not_in('status', ['ditutup']);
        $this->db->like('nama_barang', $keyword);
        return $this->db->get()->result();
    }
    private function queryResult()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_lelang', 'tb_lelang.id_barang = tb_barang.id_barang');
        $this->db->where_not_in('status', ['ditutup']);
        return $this->db->get()->result();
    }
}
