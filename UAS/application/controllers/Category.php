<?php

class Category extends CI_Controller
{
    public function programming()
    {
        $data['programming'] = $this->Category_model->programming_data()->result();
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('programming', $data);
        $this->load->view('_template/footer');
    }

    public function bahasa()
    {
        $data['bahasa'] = $this->Category_model->bahasa_data()->result();
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('bahasa', $data);
        $this->load->view('_template/footer');
    }

    public function bisnis()
    {
        $data['bisnis'] = $this->Category_model->bisnis_data()->result();
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('bisnis', $data);
        $this->load->view('_template/footer');
    }

    public function desain()
    {
        $data['desain'] = $this->Category_model->desain_data()->result();
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('desain', $data);
        $this->load->view('_template/footer');
    }

    public function lainnya()
    {
        $data['lainnya'] = $this->Category_model->lainnya_data()->result();
        $this->load->view('_template/header');
        $this->load->view('_template/sidebar');
        $this->load->view('lainnya', $data);
        $this->load->view('_template/footer');
    }
}
