<?php

class Invoice_model extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $name   = $this->input->post('name');
        $address   = $this->input->post('address');
        $telephone = $this->input->post('telephone');
        $preference = $this->input->post('preference');

        $invoice   = array(
            'name'              => $name,
            'address'           => $address,
            'telephone'         => $telephone,
            'preference'        => $preference,
            'order_date'        => date('Y-m-d H:i:s'),
            'payment_deadline'  => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
        );
        $this->db->insert('invoices', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice'    => $id_invoice,
                'id_product'    => $item['id'],
                'name_product'  => $item['name'],
                'price'         => $item['price'],
            );
            $this->db->insert('orders', $data);
        }

        return TRUE;
    }

    public function print()
    {
        $result = $this->db->get('invoices');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('invoices');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function get_id_order($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('orders');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
