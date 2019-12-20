<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    //fungsi load model customer
    function __construct()
    {
        parent::__construct();
        check_belum_login();
        $this->load->model('customer_m');
    }

    //fungsi tampil data customer
    public function index()
    {
        $data['row'] = $this->customer_m->get();
        $this->template->load('template', 'customer/customer_data', $data);
    }

    //fungsi tambah data customer
    public function add()
    {
        $customer =  new stdClass();
        $customer->customer_id = null;
        $customer->nama = null;
        $customer->jk = null;
        $customer->no_telp = null;
        $customer->alamat = null;
        $data = array(
            'page' => 'add',
            'row' => $customer
        );

        $this->template->load('template', 'customer/customer_form', $data);
    }


    //fungsi edit data customer
    public function edit($id)
    {
        $query = $this->customer_m->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $customer
            );
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan !!');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    //fungsi tambah edit &update customer
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->customer_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->customer_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
        }
        redirect('customer');
    }

    //fungsi hapus customer
    public function del($id)
    {
        $this->customer_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('hapus', 'Data berhasil Dihapus..');
        }
        redirect('customer');
    }
}
