<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category extends CI_Controller
{

    //fungsi load model kategori
    function __construct()
    {
        parent::__construct();
        check_belum_login();
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['row'] = $this->category_m->get();
        $this->template->load('template', 'tanaman/category/category_data', $data);
    }

    //fungsi tambah kategori
    public function add()
    {
        $category =  new stdClass();
        $category->category_id = null;
        $category->nama = null;
        $data = array(
            'page' => 'add',
            'row' => $category
        );

        $this->template->load('template', 'tanaman/category/category_form', $data);
    }


    //fungsi edit kategori
    public function edit($id)
    {
        $query = $this->category_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'tanaman/category/category_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan !!');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    //fungsi tambah data kategori
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->category_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->category_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
        }
        redirect('category');
    }

    //fungsi delete kategori
    public function del($id)
    {
        $this->category_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('hapus', 'Data berhasil Dihapus..');
        }
        redirect('category');
    }
}
