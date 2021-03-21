<?php
class Lelang extends CI_Controller
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
        error_reporting(0);
        $this->data['lelang'] = $this->Lelang_model->getLelangByStatus('menunggu', $this->data['petugas']->id_petugas);
        $this->data['title'] = "lelang Menunggu Konfirmasi";
        $this->load->view('dashboard/templates/petugas/header', $this->data);
        $this->load->view('dashboard/petugas/lelang/menunggu', $this->data);
        $this->load->view('dashboard/templates/petugas/footer');
    }
    public function dibuka()
    {
        $this->data['lelang'] = $this->Lelang_model->getLelangByStatus('dibuka');
        $this->data['title'] = "lelang Sedang berjalan";
        $this->load->view('dashboard/templates/petugas/header', $this->data);
        $this->load->view('dashboard/petugas/lelang/dibuka', $this->data);
        $this->load->view('dashboard/templates/petugas/footer');
    }
    public function ditutup()
    {
        $this->data['lelang'] = $this->Lelang_model->getLelangByStatus('ditutup');
        $this->data['title'] = "lelang yang ditutup";
        $this->load->view('dashboard/templates/petugas/header', $this->data);
        $this->load->view('dashboard/petugas/lelang/ditutup', $this->data);
        $this->load->view('dashboard/templates/petugas/footer');
    }

    public function accPenawaran($id)
    {

        $this->form_validation->set_rules(
            'kelipatan',
            'kelipatan',
            'trim|required|numeric',
            [
                'required' => 'kelipatan wajib di isi',
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            error_reporting(0);
            $this->data['lelang'] = $this->Lelang_model->getLelangByStatus('menunggu', $this->data['petugas']->id_petugas);
            $this->data['title'] = "lelang Menunggu Konfirmasi";
            $this->load->view('dashboard/templates/petugas/header', $this->data);
            $this->load->view('dashboard/petugas/lelang/menunggu', $this->data);
            $this->load->view('dashboard/templates/petugas/footer');
        } else {
            $data = [
                'status' => 'dibuka',
                'tgl_lelang' => date('Y-m-d'),
                'id_petugas' => $this->data['petugas']->id_petugas,
                'kelipatan' => $this->input->post('kelipatan')
            ];

            $this->Lelang_model->update($id, $data);
            redirect('dashboard/petugas/lelang/');
        }
    }
    public function TutupPenawaran($id)
    {
        $lelangPerId = $this->Lelang_model->getLelangById($id);
        $fee_petugas = $lelangPerId->harga_akhir * (10 / 100);
        $harga_akhir = $lelangPerId->harga_akhir - $fee_petugas;
        $data = [
            'status' => 'ditutup',
            'fee_petugas' => $fee_petugas,
            'harga_akhir' => $harga_akhir
        ];

        $this->db->insert('history_lelang', [
            'id_lelang' => $lelangPerId->id_lelang,
            'id_barang' => $lelangPerId->id_barang,
            'id_user' => $lelangPerId->id_user,
            'penawaran_harga' => $harga_akhir
        ]);
        $this->Lelang_model->update($id, $data);
        redirect('dashboard/petugas/lelang/dibuka');
    }
}
