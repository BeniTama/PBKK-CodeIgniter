<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                Login Terlebih Dahulu!!
            </div>
            ');
            redirect('Auth/login');
        }
    }

    public function index()
    {
        $data['products'] = $this->Product_model->getAll()->result();
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('_template/footer');
    }

    public function add_to_cart($id)
    {
        $product = $this->Product_model->find($id);

        $data = array(
            'id'    => $product->product_id,
            'qty'   => 1,
            'price' => $product->price,
            'name'  => $product->name
        );

        $this->cart->insert($data);
        redirect('welcome');
    }

    public function cart_detail()
    {
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('cart');
        $this->load->view('_template/footer');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('welcome');
    }

    public function payment()
    {
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('print_payment');
        $this->load->view('_template/footer');
    }

    public function checkout()
    {
        $is_processed = $this->Invoice_model->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('_template/header');
            $this->load->view('_template/sidebar');
            $this->load->view('checkout');
            $this->load->view('_template/footer');
        } else {
            echo "Transaction Failed!";
        }
    }
}
