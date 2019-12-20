<section class="content-header">
    <h1>
        Category
        <small>Kategori Tanaman</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i></a></li>
        <li class="active">Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box box-info">
        <div class="box-header ">
            <h3 class="box-title"><i class="fa fa-th-list"></i> Data Category</h3>
            <div class="pull-right">
                <a href="<?= site_url('category/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"> Tambah </i>
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td><?= $data->nama ?></td>
                            <td align="center" width="160px">
                                <a href="<?= site_url('category/edit/' . $data->category_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                                <a href="<?= site_url('category/del/' . $data->category_id) ?>" onclick="return confirm('Yakin Menghapus Data category <?= $data->nama ?> ?..')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Hapus</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</section>