<?php

class Invoice extends CI_Controller
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
        $data['invoice'] = $this->Invoice_model->print();

        $this->load->view('_template_admin/header_admin');
        $this->load->view('_template_admin/sidebar_admin');
        $this->load->view('admin/invoice', $data);
        $this->load->view('_template_admin/footer_admin');
    }

    public function detail($id_invoice)
    {
        $data['invoice'] = $this->Invoice_model->get_id_invoice($id_invoice);
        $data['order'] = $this->Invoice_model->get_id_order($id_invoice);

        $this->load->view('_template_admin/header_admin');
        $this->load->view('_template_admin/sidebar_admin');
        $this->load->view('admin/invoice_details', $data);
        $this->load->view('_template_admin/footer_admin');
    }
}
