<?php
class Register extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('_template/header');
            $this->load->view('register');
            $this->load->view('_template/footer');
        } else {
            $data = array(
                'id'        => '',
                'name'      => $this->input->post('name'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password1'),
                'role_id'   => 2,
            );

            $this->db->insert('users', $data);
            redirect('Auth/login');
        }
    }
}
