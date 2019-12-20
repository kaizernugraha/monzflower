<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tanaman_m extends CI_Model
{

    // start datatables
    var $column_order = array(null, 'barcode', 'p_tanaman.nama', 'category_nama', 'unit_nama', 'harga', 'stok'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'p_tanaman.nama', 'harga'); //set column field database for datatable searchable
    var $order = array('tanaman_id' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('p_tanaman.*, p_category.nama as category_nama, p_unit.nama as unit_nama');
        $this->db->from('p_tanaman');
        $this->db->join('p_category', 'p_tanaman.category_id = p_category.category_id');
        $this->db->join('p_unit', 'p_tanaman.unit_id = p_unit.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('p_tanaman');
        return $this->db->count_all_results();
    }
    // end datatables




    // fungsi model abmil semua data tanaman
    public function get($id = null)
    {
        $this->db->select('p_tanaman.*, p_category.nama as category_nama, p_unit.nama as unit_nama');
        $this->db->from('p_tanaman');
        //JOIN Dengan tabel lain
        $this->db->join('p_category', 'p_category.category_id = p_tanaman.category_id');
        $this->db->join('p_unit', 'p_unit.unit_id = p_tanaman.unit_id');
        if ($id != null) {
            $this->db->where('tanaman_id', $id);
        }
        $this->db->order_by('barcode', 'asc');
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'nama' => $post['nama'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'harga' => $post['harga'],
            'gambar' => $post['gambar'],
        ];
        $this->db->insert('p_tanaman', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'nama' => $post['nama'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'harga' => $post['harga'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['gambar'] != null) {
            $params['gambar'] = $post['gambar'];
        }

        $this->db->where('tanaman_id', $post['id']);
        $this->db->update('p_tanaman', $params);
    }


    function check_barcode($code, $id = null)
    {
        $this->db->from('p_tanaman');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('tanaman_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('tanaman_id', $id);
        $this->db->delete('p_tanaman');
    }

    function update_stock_masuk($data)
    {
        $qty = $data['qty'];
        $id = $data['tanaman_id'];
        $sql = "UPDATE p_tanaman SET stok = stok + '$qty' WHERE tanaman_id = '$id'";
        $this->db->query($sql);
    }

    function update_stock_keluar($data)
    {
        $qty = $data['qty'];
        $id = $data['tanaman_id'];
        $sql = "UPDATE p_tanaman SET stok = stok - '$qty' WHERE tanaman_id = '$id'";
        $this->db->query($sql);
    }
}
