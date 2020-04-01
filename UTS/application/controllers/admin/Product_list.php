<?php

class Product_list extends CI_Controller
{
	public function index()
	{
		$data['product'] = $this->Product_model->print()->result();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Aplikasi POS - Daftar Barang';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/product_list', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$product_name = $this->input->post('product_name');
		$price = $this->input->post('price');
		$stock = $this->input->post('stock');

		$data = array(
			'product_name'  => $product_name,
			'price'         => $price,
			'stock'         => $stock
		);

		$this->Product_model->add($data, 'product');
		redirect('admin/product_list/index');
	}

	public function edit($id)
	{
		$where = array('product_id' => $id);
		$data['product'] = $this->Product_model->edit($where, 'product')->result();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Aplikasi POS - Edit Barang';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/product_edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id				= $this->input->post('product_id');
		$product_name	= $this->input->post('product_name');
		$price			= $this->input->post('price');
		$stock			= $this->input->post('stock');

		$data = array(
			'product_name'	=> $product_name,
			'price'			=> $price,
			'stock'			=> $stock
		);

		$where = array(
			'product_id' => $id
		);

		$this->Product_model->update($where, $data, 'product');
		redirect('admin/product_list/index');
	}

	public function delete($id)
	{
		$where = array(
			'product_id' => $id
		);
		$this->Product_model->delete($where, 'product');
		redirect('admin/product_list/index');
	}
}
