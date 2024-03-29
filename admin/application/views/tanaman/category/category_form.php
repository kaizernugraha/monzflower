<section class="content-header">
    <h1>
        Category
        <small>Kategori Tanaman</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Category</h3>
            <div class="pull-right">
                <a href="<?= site_url('category') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="box-body ">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('category/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama category</label>
                            <input type="hidden" name="id" value="<?= $row->category_id ?>">
                            <input type="text" name="nama_category" value="<?= $row->nama ?>" class="form-control" placeholder="Nama " autofocus required>
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