<section class="content-header">
    <h1>
        Tanaman
        <small>Data Tanaman</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i></a></li>
        <li class="active">Tanaman</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-tree"></i> Data Product tanaman</h3>
            <div class="pull-right">
                <a href="<?= site_url('tanaman/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"> Tambah Data tanaman </i>
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Barcode</th>
                        <th>Nama Tanaman</th>
                        <th>Kategori Tanaman</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar Tanaman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td>
                                <?= $data->barcode ?><br>
                                <a href="<?= site_url('tanaman/barcode_qrcode/' . $data->tanaman_id) ?>" class="btn btn-default btn-xs">
                                    Generator <i class="fa fa-barcode "></i>
                                </a>
                            </td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->category_nama ?></td>
                            <td><?= $data->unit_nama ?></td>
                            <td><?= $data->harga ?></td>
                            <td><?= $data->stok ?></td>
                            <td align="center">
                                <?php if ($data->gambar != null) { ?>
                                    <img src="<?= base_url('uploads/tanaman/' . $data->gambar) ?>" style="width:100px"><?php } ?>

                            </td>
                            <td align="center" width="160px">
                                <a href="<?= site_url('tanaman/edit/' . $data->tanaman_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                                <a href="<?= site_url('tanaman/del/' . $data->tanaman_id) ?>" onclick="return confirm('Yakin Menghapus Data tanaman <?= $data->nama ?> ?..')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Hapus</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?> -->
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Barcode</th>
                        <th>Nama Tanaman</th>
                        <th>Kategori Tanaman</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar Tanaman</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</section>

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('tanaman/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [5, 6],
                    "className": 'text-right'
                },
                {
                    "targets": [7, -1],
                    "className": 'text-center'
                },
                {
                    "targets": [0, 7, -1],
                    "orderable": false
                },
            ],
            "order": []
        })
    })
</script>