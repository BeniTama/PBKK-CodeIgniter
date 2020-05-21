<?php

class Product_list extends CI_Controller
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
		$data['product'] = $this->Product_model->getAll()->result();
		$this->load->view('_template_admin/header_admin');
		$this->load->view('_template_admin/sidebar_admin');
		$this->load->view('admin/product_list', $data);
		$this->load->view('_template_admin/footer_admin');
	}

	public function add()
	{
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$category = $this->input->post('category');
		$price = $this->input->post('price');
		//$long_desc = $this->input->post('long_desc');
		$image = $_FILES['image']['name'];
		if ($image = '') {
		} else {
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				echo "Image failed to upload";
			} else {
				$image = $this->upload->data('file_name');
			}
		}


		$data = array(
			'name'          => $name,
			'description'   => $description,
			'category'      => $category,
			'price'         => $price,
			'image'         => $image,
			//'long_desc'		=> $long_desc
		);

		$this->Product_model->add($data, 'products');
		redirect('admin/product_list/index');
	}

	public function edit($id)
	{
		$where = array('product_id' => $id);
		$data['product'] = $this->Product_model->edit_product($where, 'products')->result();
		$this->load->view('_template_admin/header_admin');
		$this->load->view('_template_admin/sidebar_admin');
		$this->load->view('admin/product_edit', $data);
		$this->load->view('_template_admin/footer_admin');
	}

	public function update()
	{
		$id     	= $this->input->post('product_id');
		$name    	= $this->input->post('name');
		$description = $this->input->post('description');
		$category	= $this->input->post('category');
		$long_desc		= $this->input->post('long_desc');

		$data = array(
			'name'			=> $name,
			'description'	=> $description,
			'category'		=> $category,
			'long_desc'		=> $long_desc
		);

		$where = array(
			'product_id'	=> $id
		);

		$this->Product_model->update_data($where, $data, 'products');
		redirect('admin/Product_list/index');
	}

	public function delete($id)
	{
		$where = array('product_id' => $id);
		$this->Product_model->delete($where, 'products');

		redirect('admin/Product_list/index');
	}

	public function details()
	{
	}
}
