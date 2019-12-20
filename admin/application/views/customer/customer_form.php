<section class="content-header">
    <h1>
        customer
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i></a></li>
        <li class="active">Customer</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> customer</h3>
            <div class="pull-right">
                <a href="<?= site_url('customer') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="box-body ">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('customer/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama customer</label>
                            <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                            <input type="text" name="nama_customer" value="<?= $row->nama ?>" class="form-control" placeholder="Nama " autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select name="jk" class="form-control" required>
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="L" <?= $row->jk == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="P" <?= $row->jk == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nome Telepon</label>
                            <input type="number" name="no_telp" value="<?= $row->no_telp ?>" class="form-control" placeholder="Nomer Telepon " required>
                        </div>
                        <div class="form-group">
                            <label>Alamat customer</label>
                            <textarea type="alamat" name="alamat" class="form-control" placeholder="Alamatcustomer" required> <?= $row->alamat ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>