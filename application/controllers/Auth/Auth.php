<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->view('auth/template/header');
        $this->load->view('auth/login');
        $this->load->view('auth/template/footer');
    }
    public function doLogin()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required',
                ['required' => 'username wajib di isi']
            );
            $this->form_validation->set_rules(
                'password',
                'Password',
                'required',
                ['required' => 'password wajib di isi']
            );
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('auth/template/header');
                $this->load->view('auth/login');
                $this->load->view('auth/template/footer');
            } else {
                $password = $this->input->post('password');
                $username = $this->input->post('username');
                if ($this->input->post('sebagai') == 'user') {
                    $user = $this->User_model->getUserByUsername($username);


                    if (!empty($user)) {
                        if ($user->id_level == 1) {
                            if (password_verify($password, $user->password)) {
                                $session = array(
                                    'authenticated' => true,
                                    'username' => $user->username,
                                    'nama' => $user->nama_lengkap,
                                    'autentikasi' => true,
                                    'id' => $user->id_user,
                                    'level' => $user->id_level
                                );
                                $this->session->set_userdata($session);
                                redirect('Dashboard/masyarakat/home');
                            } else {
                                $this->session->set_flashdata('message', 'Password yang anda masukan salah');
                                redirect('auth/auth/login');
                            }
                        } else {
                            $this->session->set_flashdata('message',  'Anda tidak bisa login dengan level ini');
                            redirect('auth/auth/login');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Username tidak ditemukan');
                        redirect('auth/auth/login');
                    }
                } else if ($this->input->post('sebagai') == 'admin') {
                    $user = $this->Admin_model->getUserByUsername($username);
                    if (!empty($user)) {
                        if ($user->id_level == 2) {
                            if (password_verify($password, $user->password)) {
                                $session = array(

                                    'username' => $user->username,
                                    'nama' => $user->nama_admin,
                                    'id' => $user->id_admin,
                                    'autentikasi' => true,
                                    'level' => $user->id_level
                                );
                                $this->session->set_userdata($session);
                                redirect('Dashboard/Admin/home');
                            } else {
                                $this->session->set_flashdata('message',  'Password yang anda masukan salah');
                                redirect('auth/auth/login');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Anda tidak bisa login dengan level ini');
                            redirect('auth/auth/login');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Username tidak ditemukan');
                        redirect('auth/auth/login');
                    }
                } else if ($this->input->post('sebagai') == 'petugas') {

                    $user = $this->Petugas_model->getUserByUsername($username);
                    if (!empty($user)) {
                        if ($user->id_level == 3) {
                            if (password_verify($password, $user->password)) {
                                $session = array(

                                    'username' => $user->username,
                                    'nama' => $user->nama_petugas,
                                    'autentikasi' => true,
                                    'id' => $user->id_petugas,
                                    'level' => $user->id_level
                                );
                                $this->session->set_userdata($session);
                                redirect('Dashboard/Petugas/home');
                            } else {
                                $this->session->set_flashdata('message', 'Password yang anda masukan salah');
                                redirect('auth/auth/login');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Password yang anda masukan salah');
                            redirect('auth/auth/login');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Anda tidak bisa login dengan level ini');
                        redirect('auth/auth/login');
                    }
                } else {
                    redirect('auth/auth/login');
                }
            }
        }
    }
    public function register()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'nama_lengkap',
                'nama lengkap',
                'required',
                ['required' => 'nama lengkap wajib di isi']
            );
            $this->form_validation->set_rules(
                'email',
                'Email',
                'required|valid_email|is_unique[tb_masyarakat.email]',
                [
                    'required' => 'email wajib di isi',
                    'valid_email' => 'email yang anda masukan harus valid',
                    'is_unique' => 'email yang anda masukan sudah ada',
                ]
            );

            $this->form_validation->set_rules('telp', 'nomor hp', 'required|numeric');
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required|is_unique[tb_masyarakat.username]',
                [
                    'required' => 'email wajib di isi',
                    'is_unique' => "username yang anda masukan sudah ada"
                ]
            );
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules(
                'passconf',
                'Password Konfirmasi',
                'required|matches[password]',
                [
                    'required' => "password konfirmasi wajib di isi",
                    'matches' => "password konfirmasi harus sama dengan password",
                ]
            );
            if ($this->form_validation->run() != false) {
                $data = [
                    'nama_lengkap' => $this->input->post('nama_lengkap', true),
                    'email' => $this->input->post('email', true),
                    'telp' => $this->input->post('telp', true),
                    'username' => $this->input->post('username', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                    'id_level' => 1
                ];
                $this->User_model->register($data);
                $this->session->set_flashdata('message', 'anda berhasil mendaftar');
                redirect('auth/auth/login');
            } else {
                $this->load->view('auth/template/header');
                $this->load->view('auth/register');
                $this->load->view('auth/template/footer');
            }
        } else {
            $this->load->view('auth/template/header');
            $this->load->view('auth/register');
            $this->load->view('auth/template/footer');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth/auth/login');
    }
}
