<?php

class Dashboard_admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/footer');
    }
}
