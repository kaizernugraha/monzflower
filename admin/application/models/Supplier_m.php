<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_m extends CI_Model
{

    // fungsi model abmil semua data supplier
    public function get($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'nama' => $post['nama_supplier'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'keterangan' => empty($post['keterangan']) ? null : $post['keterangan'],
        ];
        $this->db->insert('supplier', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama_supplier'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'keterangan' => empty($post['keterangan']) ? null : $post['keterangan'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('supplier_id', $post['id']);
        $this->db->update('supplier', $params);
    }

    public function del($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}
