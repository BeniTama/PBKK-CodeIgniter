<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['products'] = $this->Product_model->getAll()->result();
		$this->load->view('_template/header');
		$this->load->view('_template/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('_template/footer');
	}

	public function details($id_prd)
	{
		$data['product'] = $this->Product_model->print_detail($id_prd);

		$this->load->view('_template/header');
		$this->load->view('_template/sidebar');
		$this->load->view('product_detail', $data);
		$this->load->view('_template/footer');
	}
}
