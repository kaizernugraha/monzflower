<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer_m extends CI_Model
{

    // fungsi model abmil semua data customer
    public function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'nama' => $post['nama_customer'],
            'jk' => $post['jk'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
        ];
        $this->db->insert('customer', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama_customer'],
            'jk' => $post['jk'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }

    public function del($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }
}
