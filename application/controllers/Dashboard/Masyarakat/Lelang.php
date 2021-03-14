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

        $this->form_validation->set_rules(
            'nama_barang',
            'nama barang',
            'trim|required',
            [
                'required' => 'nama barang wajib di isi',
            ]
        );
        if (empty($_FILES['gambar_barang']['name'])) {
            $this->form_validation->set_rules(
                'gambar_barang',
                'Gambar barang',
                'required',
                [
                    'required' => 'gambar barang wajib di isi',
                ]
            );
        }

        $this->form_validation->set_rules(
            'harga_awal',
            'Harga Awal',
            'trim|required|numeric',
            [
                'required' => 'stock buku wajib di isi',
                'numeric' => "stock buku wajib di isi dengan angka"
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi_barang',
            'deskripsi barang',
            'trim|required',
            ['required' => 'deskripsi barang wajib di isi']
        );
        if ($this->form_validation->run() == FALSE) {
            $this->data['title'] = "Tambah Lelang";
            $this->load->view('dashboard/templates/masyarakat/header', $this->data);
            $this->load->view('dashboard/masyarakat/lelang/tambahLelang', $this->data);
            $this->load->view('dashboard/templates/masyarakat/footer');
        } else {
            $config['upload_path'] = './public/assets/dashboard/docs/assets/img/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2000;
            $config['file_name'] = uniqid() . time() . $_FILES["gambar_barang"]['name'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_barang')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('dashboard/masyarakat/Lelang');
                die;
            }
            $gambar = $this->upload->data('file_name');
            $dataBarang = [
                'nama_barang' => $this->input->post('nama_barang'),
                'harga_awal' => $this->input->post('harga_awal'),
                'deskripsi_barang' => $this->input->post('deskripsi_barang'),
                'id_user' => $this->data['user']->id_user,
                'tgl' => date("Y-m-d"),
                'gambar_barang' => $gambar
            ];
            $this->Barang_model->insert($dataBarang);
            $barang =  $this->Barang_model->getByGambar($gambar);

            $dataLelang = [
                'id_barang' => $barang->id_barang,
                'harga_akhir' => $this->input->post('harga_awal'),
                'id_user' => $this->data['user']->id_user,
                'status' => "menunggu",
            ];
            $this->Lelang_model->insert($dataLelang);
            redirect('dashboard/masyarakat/Lelang/listLelangUser/');
        }
    }
    public function edit($id)
    {

        $this->data['barang'] =  $this->Barang_model->getBarangById($id);
        $this->form_validation->set_rules(
            'nama_barang',
            'nama barang',
            'trim|required',
            [
                'required' => 'nama barang wajib di isi',
            ]
        );
        $this->form_validation->set_rules(
            'harga_awal',
            'Harga Awal',
            'trim|required|numeric',
            [
                'required' => 'stock buku wajib di isi',
                'numeric' => "stock buku wajib di isi dengan angka"
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi_barang',
            'deskripsi barang',
            'trim|required',
            ['required' => 'deskripsi barang wajib di isi']
        );
        if ($this->form_validation->run() == FALSE) {
            $this->data['title'] = "Edit Lelang";
            $this->load->view('dashboard/templates/masyarakat/header', $this->data);
            $this->load->view('dashboard/masyarakat/lelang/editLelang', $this->data);
            $this->load->view('dashboard/templates/masyarakat/footer');
        } else {
            if (empty($_FILES['gambar_barang']['name'])) {
                $dataBarang = [
                    'nama_barang' => $this->input->post('nama_barang'),
                    'harga_awal' => $this->input->post('harga_awal'),
                    'deskripsi_barang' => $this->input->post('deskripsi_barang'),
                    'id_user' => $this->data['user']->id_user,
                    'tgl' => date("Y-m-d"),
                ];
            } else {
                $config['upload_path'] = './public/assets/dashboard/docs/assets/img/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2000;
                $config['file_name'] = uniqid() . time() . $_FILES["gambar_barang"]['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar_barang')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('dashboard/masyarakat/edit/' . $id);
                    die;
                }
                $gambar = $this->upload->data('file_name');
                $dataBarang = [
                    'nama_barang' => $this->input->post('nama_barang'),
                    'harga_awal' => $this->input->post('harga_awal'),
                    'deskripsi_barang' => $this->input->post('deskripsi_barang'),
                    'id_user' => $this->data['user']->id_user,
                    'tgl' => date("Y-m-d"),
                    "gambar_barang" => $gambar
                ];
            }

            $this->Barang_model->update($id, $dataBarang);
            redirect('dashboard/masyarakat/Lelang/listLelangUser/');
        }
    }
    public function listLelangUser()
    {
        $this->data['title'] = "List Lelang Anda";
        $this->data['lelang'] = $this->Lelang_model->getByUser($_SESSION['id']);
        $this->load->view('dashboard/templates/masyarakat/header', $this->data);
        $this->load->view('dashboard/masyarakat/lelang/listLelang', $this->data);
        $this->load->view('dashboard/templates/masyarakat/footer');
    }
    public function cancel($id_lelang, $id_barang)
    {
        $this->Barang_model->delete($id_barang);
        $this->Lelang_model->delete($id_lelang);
        redirect('dashboard/masyarakat/Lelang/listLelangUser/');
    }
    public function getGambarBarang()
    {
        $this->db->where('id_barang', $_POST['id']);
        $this->db->select('gambar_barang');
        $result = $this->db->get('tb_barang');
        echo json_encode($result->row());
    }
}
