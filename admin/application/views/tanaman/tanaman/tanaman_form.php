<section class="content-header">
    <h1>
        Tanaman
        <small>Data Tanaman</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Tanaman</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Tanaman</h3>
            <div class="pull-right">
                <a href="<?= site_url('tanaman') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="box-body ">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('tanaman/process') ?>
                    <div class="form-group">
                        <label><i class="fa fa-barcode"></i> Barcode *</label>
                        <input type="hidden" name="id" value="<?= $row->tanaman_id ?>">
                        <input type="text" name="barcode" value="<?= $row->barcode ?>" class="form-control" placeholder="Barcode Tanaman" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="nama"><i class="fa fa-tree"></i> Nama Tanaman *</label>
                        <input type="text" name="nama" id="nama" value="<?= $row->nama ?>" class="form-control" placeholder="Nama Tanaman " required>
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-arrows-v"></i> Category *</label>
                        <select name="category" class="form-control" required>
                            <option value="">-- Pilih Satu --</option>
                            <!--Mengabil data dari tabel kategori menggunakan get data php manual-->
                            <?php foreach ($category->result() as $key => $data) { ?>
                                <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->nama ?></option>
                            <?php } ?>
                        </select>
                        <span><a href="<?= site_url('category/add') ?>"><i class="fa fa-plus-square"></i> Tambahkan categori tanaman disini</a></span>
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-arrows-v"></i> Unit *</label>
                        <!--Mengabil data dari tabel kategori menggunakan get data php CI-->
                        <?php echo form_dropdown(
                            'unit',
                            $unit,
                            $selectedunit,
                            ['class' => 'form-control', 'required' => 'required']
                        )
                        ?>
                        <span><a href="<?= site_url('unit/add') ?>"><i class="fa fa-plus-square"></i> Tambahkan Unit tanaman disini</a></span>
                    </div>
                    <div class="form-group">
                        <label>Harga *</label>
                        <input type="number" name="harga" value="<?= $row->harga ?>" class="form-control" placeholder="Harga Tanaman" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-photo"></i> Gambar</label>
                        <?php if ($page == 'edit') {
                            if ($row->gambar != null) { ?>
                                <div style="margin-bottom:5px">
                                    <img src="<?= base_url('uploads/tanaman/' . $row->gambar) ?>" style="width:80%">
                                </div>
                        <?php
                            }
                        } ?>
                        <input type="file" name="gambar" class="form-control">
                        <small>(Biarkan Kosong jika Tidak <?= $page == 'edit' ? 'diganti' : 'Ada' ?>)</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>