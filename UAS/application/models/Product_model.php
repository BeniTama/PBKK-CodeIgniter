<?php

class Product_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('products');
    }

    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_product($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('product_id', $id)->limit(1)->get('products');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function print_detail($id_prd)
    {
        $result = $this->db->where('product_id', $id_prd)->get('products');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
