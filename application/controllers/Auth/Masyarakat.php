<?php
class Masyarakat extends CI_Controller
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
    public function updateProfile()
    {


        $this->data['title'] = "Edit Profile";
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'nama_lengkap',
                'nama lengkap',
                'required|trim',
                ['required' => 'nama lengkap wajib di isi']
            );
            if ($this->input->post("username") ==  $this->data['user']->username && $this->input->post('username') != '') {
                $this->form_validation->set_rules(
                    'username',
                    'username',
                    'required|trim|min_length[5]',
                    ['required' => 'username wajib di isi']
                );
            } else {
                $this->form_validation->set_rules(
                    'username',
                    'username',
                    'required|trim|min_length[5]|is_unique[tb_masyarakat.username]',
                    ['required' => 'username wajib di isi']
                );
            }
            if ($this->input->post("email") ==  $this->data['user']->email && $this->input->post('email') != '') {
                $this->form_validation->set_rules(
                    'email',
                    'email',
                    'required|trim|min_length[5]',
                    ['required' => 'email wajib di isi']
                );
            } else {
                $this->form_validation->set_rules(
                    'email',
                    'email',
                    'required|trim|min_length[5]|is_unique[tb_masyarakat.email]',
                    ['required' => 'email wajib di isi']
                );
            }

            $this->form_validation->set_rules(
                'telp',
                'Telephone',
                'required|trim',
                ['required' => 'Nomor Telephone wajib di isi']
            );

            if ($this->form_validation->run() != false) {
                $gambar = $_FILES['gambar']['name'];
                if ($gambar == '') {
                    $datas = [
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'telp' => $this->input->post('telp'),

                    ];
                } else {
                    unlink('./public/assets/dashboard/docs/assets/img/upload/' . $this->data['user']->gambar);
                    $config['upload_path'] = './public/assets/dashboard/docs/assets/img/upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2000;
                    $config['file_name'] = "U-" . time() . $_FILES["gambar"]['name'];
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('gambar')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('auth/Masyarakat/updateProfile');
                    }
                    $gambar = $this->upload->data('file_name');
                    $datas = [
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'telp' => $this->input->post('telp'),

                        'gambar' => $gambar
                    ];
                }
                $_SESSION['username'] = $this->input->post("username");
                $_SESSION['email'] = $this->input->post("email");
                $this->User_model->update($this->input->post('id'), $datas);
                $this->session->set_flashdata('message', 'anda berhasil Mengedit Profile');

                redirect('auth/Masyarakat/updateProfile');
            } else {

                $this->load->view('dashboard/templates/masyarakat/footer');
                $this->load->view("dashboard/masyarakat/profile/updateProfile", $this->data);
                $this->load->view('dashboard/templates/masyarakat/footer');
            }
        } else {

            $this->load->view('dashboard/templates/masyarakat/header', $this->data);
            $this->load->view("dashboard/masyarakat/profile/updateProfile", $this->data);
            $this->load->view('dashboard/templates/masyarakat/footer');
        }
    }

    public function updatePass()
    {
        $this->data['title'] = "edit password";
        $this->updatePassword($this->data);
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
            if (!password_verify($this->input->post('passlatest'), $data['user']->password) && $this->input->post('passlatest') != '') {
                $this->session->set_flashdata('error', 'password anda tidak cocok dengan password anda yang sekarang');
                redirect('auth/Masyarakat/updatePass');
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
                $this->User_model->update($this->input->post('id'), $data);
                $this->session->set_flashdata('message', 'anda berhasil Mengganti password');

                redirect('auth/Masyarakat/updatePass');
            } else {

                $this->load->view('dashboard/templates/masyarakat/header', $this->data);
                $this->load->view("dashboard/masyarakat/profile/updatePassword", $data);
                $this->load->view('dashboard/templates/masyarakat/footer');
            }
        } else {

            $this->load->view('dashboard/templates/masyarakat/header', $this->data);
            $this->load->view("dashboard/masyarakat/profile/updatePassword", $data);
            $this->load->view('dashboard/templates/masyarakat/footer');
        }
    }
}
