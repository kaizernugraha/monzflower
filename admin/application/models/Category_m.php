<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category_m extends CI_Model
{

    // fungsi model abmil semua data category
    public function get($id = null)
    {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'nama' => $post['nama_category'],
        ];
        $this->db->insert('p_category', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama_category'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['id']);
        $this->db->update('p_category', $params);
    }

    public function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}
