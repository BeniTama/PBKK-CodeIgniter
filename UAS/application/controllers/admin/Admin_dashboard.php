<?php

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                Authorize Admin Account!
            </div>
            ');
            redirect('Auth/login');
        }
    }

    public function index()
    {
        $this->load->view('_template_admin/header_admin');
        $this->load->view('_template_admin/sidebar_admin');
        $this->load->view('admin/dashboard');
        $this->load->view('_template_admin/footer_admin');
    }

    public function process()
    {
        $is_processed = $this->invoice_model->index();
        if ($is_processed) {
            $this->load->view('_template_admin/header_admin');
            $this->load->view('_template_admin/sidebar_admin');
            $this->load->view('checkout');
            $this->load->view('_template_admin/footer_admin');
        } else {
            echo "Transaction failed!";
        }
    }
}
