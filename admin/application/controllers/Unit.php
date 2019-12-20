<?php
defined('BASEPATH') or exit('No direct script access allowed');

class unit extends CI_Controller
{

    //fungsi load model
    function __construct()
    {
        parent::__construct();
        check_belum_login();
        $this->load->model('unit_m');
    }

    //fungsi tampil data
    public function index()
    {
        $data['row'] = $this->unit_m->get();
        $this->template->load('template', 'tanaman/unit/unit_data', $data);
    }

    //fungsi tambah data
    public function add()
    {
        $unit =  new stdClass();
        $unit->unit_id = null;
        $unit->nama = null;
        $data = array(
            'page' => 'add',
            'row' => $unit
        );

        $this->template->load('template', 'tanaman/unit/unit_form', $data);
    }


    //fungsi edit data
    public function edit($id)
    {
        $query = $this->unit_m->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $unit
            );
            $this->template->load('template', 'tanaman/unit/unit_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan !!');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    //fungsi C tambah &update
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->unit_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->unit_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
        }
        redirect('unit');
    }

    //fungsi C delete
    public function del($id)
    {
        $this->unit_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('hapus', 'Data berhasil Dihapus..');
        }
        redirect('unit');
    }
}
