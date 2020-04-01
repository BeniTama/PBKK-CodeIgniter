<?php

class Invoice_model extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');

        $invoice = array(
            'order_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'invoice_id'    => $id_invoice,
                'product_id'    => $item['id'],
                'product_name'  => $item['name'],
                'quantity'      => $item['qty'],
                'price'         => $item['price']
            );
            $this->db->insert('orders', $data);
        }
        return TRUE;
    }

    public function print()
    {
        $result = $this->db->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_invoice_id($invoice_id)
    {
        $result = $this->db->where('id', $invoice_id)->limit(1)->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function get_order_id($invoice_id)
    {
        $result = $this->db->where('invoice_id', $invoice_id)->get('orders');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
