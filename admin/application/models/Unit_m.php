<?php
defined('BASEPATH') or exit('No direct script access allowed');

class unit_m extends CI_Model
{

    // fungsi model abmil semua data unit
    public function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'nama' => $post['nama_unit'],
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama_unit'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['id']);
        $this->db->update('p_unit', $params);
    }

    public function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}
