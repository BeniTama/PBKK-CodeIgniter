<?php

class Cashier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Product_model->print()->result();
        $data['title'] = 'Aplikasi POS - Kasir';

        if ($this->session->userdata('role_id') == 2) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('cashier', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('cashier', $data);
            $this->load->view('templates/footer');
        }
    }

    public function add_product()
    {
        $id = $this->input->post('product_id');
        $product = $this->Product_model->find($id);

        $data = array(
            'id'    => $product->product_id,
            'qty'   => 1,
            'price' => $product->price,
            'name'  => $product->product_name
        );

        $this->cart->insert($data);
        redirect('cashier');
    }

    public function clear_cart()
    {
        $this->cart->destroy();
        redirect('cashier');
    }

    public function payment()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Aplikasi POS - Tagihan';

        $is_processed = $this->Invoice_model->index();
        if ($is_processed) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('invoice');
            $this->load->view('templates/footer');
        } else {
            echo "Payment Failed!";
        }
    }
}
