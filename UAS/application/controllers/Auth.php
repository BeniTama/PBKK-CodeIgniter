<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('_template/header');
            $this->load->view('login_page');
            $this->load->view('_template/footer');
        } else {
            $auth = $this->Auth_model->authorize();

            if ($auth == FALSE) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Username or Password is incorrect!
                </div>
                ');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/Admin_dashboard');
                        break;
                    case 2:
                        redirect('welcome');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
