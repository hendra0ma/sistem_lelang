<?php
class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('landing_pages/templates/header');
        $this->load->view('landing_pages/home/index');
        $this->load->view('landing_pages/templates/footer');
    }
}
