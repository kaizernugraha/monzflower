<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    //fungsi load model tanaman, supplier & stock 
    function __construct()
    {
        parent::__construct();
        check_belum_login();
        $this->load->model(['tanaman_m', 'supplier_m', 'stock_m']);
    }

    //fungsi tampil data stock masuk
    public function stock_masuk_data()
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'transaksi/stock_masuk/stock_masuk_data', $data);
    }

    //fungsi tambah data stock masuk
    public function stock_masuk_add()
    {
        $tanaman = $this->tanaman_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = ['tanaman' => $tanaman, 'supplier' => $supplier];
        $this->template->load('template', 'transaksi/stock_masuk/stock_masuk_form', $data);
    }

    //fungsi delete data stock masuk & update stock tanaman
    public function stock_masuk_del()
    {
        $stock_id = $this->uri->segment(4);
        $tanaman_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'tanaman_id' => $tanaman_id];
        $this->tanaman_m->update_stock_keluar($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data Stock-in berhasil Di hapus..');
        }
        redirect('stock/masuk');
    }

    //fungsi tambah data stock masuk & update stock tanaman
    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->tambah_stock_in($post);
            $this->tanaman_m->update_stock_masuk($post);
            if ($this->db->affected_rows() > 0) {

                $this->session->set_flashdata('success', 'Data Stock-in berhasil Di Simpan..');
            }
            redirect('stock/masuk');
        }
    }
}
