<?php

class Category_model extends CI_Model
{
    public function programming_data()
    {
        return $this->db->get_where("products", array('category' => "Programming"));
    }

    public function bahasa_data()
    {
        return $this->db->get_where("products", array('category' => "Bahasa"));
    }

    public function bisnis_data()
    {
        return $this->db->get_where("products", array('category' => "Bisnis"));
    }

    public function desain_data()
    {
        return $this->db->get_where("products", array('category' => "Desain"));
    }

    public function lainnya_data()
    {
        return $this->db->get_where("products", array('category' => "Lainnya"));
    }
}
