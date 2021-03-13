<?php
class Petugas extends CI_Controller
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
    public function update($jenis = 'user')
    {
        $this->data['title'] = "petugas Profile";

        if ($jenis == 'user') {
            $this->updateProfile($this->data);
        } else {
            $this->updatePassword($this->data);
        }
    }


    private function updateProfile($data)
    {

        if ($this->input->post()) {


            $this->form_validation->set_rules(
                'nama_petugas',
                'nama lengkap',
                'required',
                ['required' => 'nama lengkap wajib di isi']
            );


            if ($this->form_validation->run() != false) {
                $gambar = $_FILES['gambar']['name'];
                if ($gambar == '') {
                    $datas = [
                        'nama_petugas' => $this->input->post('nama_petugas'),
                    ];
                } else {
                    unlink('./public/assets/dashboard/docs/assets/img/upload/' . $this->data['petugas']->gambar);
                    $config['upload_path'] = './public/assets/dashboard/docs/assets/img/upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2000;
                    $config['file_name'] = "petugas-" . time() . $_FILES["userfiles"]['name'];
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('gambar')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('auth/petugas/update/user');
                    }
                    $gambar = $this->upload->data('file_name');
                    $datas = [
                        'nama_petugas' => $this->input->post('nama_petugas'),
                        'gambar' => $gambar
                    ];
                }

                $this->Petugas_model->update($datas, $this->input->post('id'));
                $this->session->set_flashdata('message', 'anda berhasil Mengedit Profile');

                redirect('auth/petugas/update/password');
            } else {

                $this->load->view('dashboard/templates/petugas/header', $data);
                $this->load->view('dashboard/petugas/update', $data);
                $this->load->view('dashboard/templates/petugas/footer');
            }
        } else {

            $this->load->view('dashboard/templates/petugas/header', $data);
            $this->load->view('dashboard/petugas/update', $data);
            $this->load->view('dashboard/templates/petugas/footer');
        }
    }
    private function updatePassword($data)
    {



        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'passlatest',
                'Password lama',
                'required',
                ['required' => 'Password lama wajib di isi']
            );
            if (!password_verify($this->input->post('passlatest'), $data['petugas']->password) && $this->input->post('passlatest') != '') {
                $this->session->set_flashdata('error', 'password anda tidak cocok dengan password anda yang sekarang');
                redirect('auth/petugas/update/password');
                die;
            }

            $this->form_validation->set_rules(
                'password',
                'password',
                'required',
                [
                    'required' => 'Password wajib di isi',
                ]
            );
            $this->form_validation->set_rules(
                'passconf',
                'password Konfirmasi',
                'required|matches[password]',
                [
                    'required' => "password konfirmasi wajib di isi",
                    'matches' => "password konfirmasi harus sama dengan password",
                ]
            );


            if ($this->form_validation->run() != false) {
                $data = [
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),

                ];
                $this->Petugas_model->update($data, $this->input->post('id'));
                $this->session->set_flashdata('message', 'anda berhasil Mengganti password');

                redirect('auth/petugas/update/password');
            } else {

                $this->load->view('dashboard/templates/petugas/header', $data);
                $this->load->view('dashboard/petugas/update', $data);
                $this->load->view('dashboard/templates/petugas/footer');
            }
        } else {

            $this->load->view('dashboard/templates/petugas/header', $data);
            $this->load->view('dashboard/petugas/update', $data);
            $this->load->view('dashboard/templates/petugas/footer');
        }
    }
}
