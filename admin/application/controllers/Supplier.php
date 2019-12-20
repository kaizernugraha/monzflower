<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    //fungsi load model
    function __construct()
    {
        parent::__construct();
        check_belum_login();
        $this->load->model('supplier_m');
    }

    //fungsi tampil data 
    public function index()
    {
        $data['row'] = $this->supplier_m->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }

    //fungsi tambah data 
    public function add()
    {
        $supplier =  new stdClass();
        $supplier->supplier_id = null;
        $supplier->nama = null;
        $supplier->no_telp = null;
        $supplier->alamat = null;
        $supplier->keterangan = null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );

        $this->template->load('template', 'supplier/supplier_form', $data);
    }


    //fungsi edit data
    public function edit($id)
    {
        $query = $this->supplier_m->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $this->template->load('template', 'supplier/supplier_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan !!');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    //fungsi tambah & update
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->supplier_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->supplier_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
        }
        redirect('supplier');
    }

    //fungsi delete data
    public function del($id)
    {
        $this->supplier_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('hapus', 'Data berhasil Dihapus..');
        }
        redirect('supplier');
    }
}
