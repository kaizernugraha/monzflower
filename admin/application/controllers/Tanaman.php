<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tanaman extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_belum_login();
        $this->load->model(['tanaman_m', 'category_m', 'unit_m']);
    }

    //fungsi get ajak datatables server side
    function get_ajax()
    {
        $list = $this->tanaman_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $tanaman) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $tanaman->barcode . '<br><a href="' . site_url('tanaman/barcode_qrcode/' . $tanaman->tanaman_id) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $tanaman->nama;
            $row[] = $tanaman->category_nama;
            $row[] = $tanaman->unit_nama;
            $row[] = indo_currency($tanaman->harga);
            $row[] = $tanaman->stok;
            $row[] = $tanaman->gambar != null ? '<img src="' . base_url('uploads/tanaman/' . $tanaman->gambar) . '" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="' . site_url('tanaman/edit/' . $tanaman->tanaman_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                   <a href="' . site_url('tanaman/del/' . $tanaman->tanaman_id) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->tanaman_m->count_all(),
            "recordsFiltered" => $this->tanaman_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['row'] = $this->tanaman_m->get();
        $this->template->load('template', 'tanaman/tanaman/tanaman_data', $data);
    }

    public function add()
    {
        $tanaman =  new stdClass();
        $tanaman->tanaman_id = null;
        $tanaman->barcode = null;
        $tanaman->nama = null;
        $tanaman->harga = null;
        $tanaman->category_id = null;

        //mengabil data category model
        $query_category = $this->category_m->get();
        //mengabil data dari unit model
        $query_unit = $this->unit_m->get();
        $unit[null] = '-- Pilih Satu --';
        foreach ($query_unit->result() as $unt) {
            $unit[$unt->unit_id] = $unt->nama;
        }

        $data = array(
            'page' => 'add',
            'row' => $tanaman,
            'category' => $query_category,
            'unit' => $unit, 'selectedunit' => null,
        );

        $this->template->load('template', 'tanaman/tanaman/tanaman_form', $data);
    }


    public function edit($id)
    {
        $query = $this->tanaman_m->get($id);
        if ($query->num_rows() > 0) {
            $tanaman = $query->row();
            //mengabil data category model
            $query_category = $this->category_m->get();
            //mengabil data dari unit model
            $query_unit = $this->unit_m->get();
            $unit[null] = '-- Pilih Satu --';
            foreach ($query_unit->result() as $unt) {
                $unit[$unt->unit_id] = $unt->nama;
            }

            $data = array(
                'page' => 'edit',
                'row' => $tanaman,
                'category' => $query_category,
                'unit' => $unit, 'selectedunit' => $tanaman->unit_id,
            );

            $this->template->load('template', 'tanaman/tanaman/tanaman_form', $data);
        } else {
            echo "<script>alert('Data Tidak Dtanamanukan !!');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/tanaman/';
        $config['allowed_types']      = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048;
        $config['file_name']      = 'MF-tanaman-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->tanaman_m->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah di pakai tanaman lain");
                redirect('tanaman/add');
            } else {
                if (@$_FILES['gambar']['name'] != null) {
                    if ($this->upload->do_upload('gambar')) {
                        $post['gambar'] = $this->upload->data('file_name');
                        $this->tanaman_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
                        }
                        redirect('tanaman');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('tanaman/add');
                    }
                } else {
                    $post['gambar'] = null;
                    $this->tanaman_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
                    }
                    redirect('tanaman');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->tanaman_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah di pakai tanaman lain");
                redirect('tanaman/edit/' . $post['id']);
            } else {
                if (@$_FILES['gambar']['name'] != null) {
                    if ($this->upload->do_upload('gambar')) {

                        $tanaman = $this->tanaman_m->get($post['id'])->row();
                        if ($tanaman->gambar != null) {
                            $target_file = './uploads/tanaman/' . $tanaman->gambar;
                            unlink($target_file);
                        }

                        $post['gambar'] = $this->upload->data('file_name');
                        $this->tanaman_m->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
                        }
                        redirect('tanaman');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('tanaman/add');
                    }
                } else {
                    $post['gambar'] = null;
                    $this->tanaman_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil Di Simpan..');
                    }
                    redirect('tanaman');
                }
            }
        }
    }

    public function del($id)
    {
        $tanaman = $this->tanaman_m->get($id)->row();
        if ($tanaman->gambar != null) {
            $target_file = './uploads/tanaman/' . $tanaman->gambar;
            unlink($target_file);
        }

        $this->tanaman_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('hapus', 'Data berhasil Dihapus..');
        }
        redirect('tanaman');
    }

    //fungsi menambahkan barcode dari library
    function barcode_qrcode($id)
    {
        $data['row'] = $this->tanaman_m->get($id)->row();
        $this->template->load('template', 'tanaman/tanaman/barcode_qrcode', $data);
    }

    function barcode_print($id)
    {
        $data['row'] = $this->tanaman_m->get($id)->row();
        $html = $this->load->view('tanaman/tanaman/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-' . $data['row']->barcode, 'A4', 'landscape');
    }

    function qrcode_print($id)
    {
        $data['row'] = $this->tanaman_m->get($id)->row();
        $html = $this->load->view('tanaman/tanaman/qrcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'qrcode-' . $data['row']->barcode, 'A4', 'potrait');
    }
}
