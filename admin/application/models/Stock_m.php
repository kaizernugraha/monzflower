<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_m extends CI_Model
{

    //fungsi get stock id 
    public function get($id = null)
    {
        $this->db->from('t_stock');
        if ($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //fungsi untuk delete stock 
    public function del($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('t_stock');
    }

    //fungsi get dan join tabel 
    public function get_stock_in()
    {
        $this->db->select('t_stock.stock_id, p_tanaman.barcode, 
        p_tanaman.nama as tanaman_nama, qty, date, detail, 
        supplier.nama as supplier_nama, p_tanaman.tanaman_id');
        $this->db->from('t_stock');
        $this->db->join('p_tanaman', 't_stock.tanaman_id = p_tanaman.tanaman_id');
        $this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'masuk');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    // fungsi model abmil semua data unit
    public function tambah_stock_in($post)
    {
        $params = [
            'tanaman_id' => $post['tanaman_id'],
            'type' => 'masuk',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('t_stock', $params);
    }
}
