<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    //fungsi model login 
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    // fungsi model abmil semua data user
    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // fungsi model menambahkan data user
    public function add($post)
    {
        $params['nama'] = $post['nama'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }

    //fungsi model untuk mengedit data user sesuai id
    public function edit($post)
    {
        $params['nama'] = $post['nama'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    //fungsi model menghapus data user sesuai id
    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
