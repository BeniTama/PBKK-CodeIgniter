<?php

class Transaction extends CI_Controller
{
    public function index()
    {
        $data['invoice'] = $this->Invoice_model->print();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Aplikasi POS - Data Transaksi';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/footer');
    }

    public function detail($invoice_id)
    {
        $data['invoice'] = $this->Invoice_model->get_invoice_id($invoice_id);
        $data['order'] = $this->Invoice_model->get_order_id($invoice_id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Aplikasi POS - Detail Transaksi';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/invoice_detail', $data);
        $this->load->view('templates/footer');
    }
}
