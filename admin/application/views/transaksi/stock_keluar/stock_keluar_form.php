<section class="content-header">
    <h1>
        Transaksi
        <small>Stock Tanaman Masuk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaksi</li>
        <li class="active">Stock Masuk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Tambah Stock Masuk</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/masuk') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="box-body ">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('stock/process') ?>" method="post">
                        <div class="form-group">
                            <label>Tanggal </label>
                            <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" placeholder="Nama " required>
                        </div>
                        <div>
                            <label for="barcode">Barcode </label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="tanaman_id" id="tanaman_id">
                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Cari Barcode " required autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="nama_tanaman">Nama Tanaman </label>
                            <input type="text" name="nama_tanaman" id="nama_tanaman" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="unit_name">Tanaman Unit</label>
                                    <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock">Initial Stock</label>
                                    <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <input type="text" name="detail" class="form-control" placeholder="kulakan / Tambahan / etc" required>
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="supplier" class="form-control">
                                <option value="">- Pilih Supplier -</option>
                                <?php foreach ($supplier as $i => $data) {
                                    echo '<option value="' . $data->supplier_id . '">' . $data->nama . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="number" name="qty" class="form-control" placeholder="Masukan Jumlah Qty" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="in_add" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal  fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span arial-hidden="true">&times;<span>
                </button>
                <h4 class="modal-title fa fa-tree"> Pilih Product Tanaman</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Nama Tanaman</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tanaman as $i => $data) { ?>
                            <tr>
                                <td class="fa fa-barcode"> <?= $data->barcode ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->unit_nama ?></td>
                                <td class="text-right"><?= indo_currency($data->harga) ?></td>
                                <td class="text-right"><?= $data->stok ?></td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->tanaman_id ?>" data-barcode="<?= $data->barcode ?>" data-nama="<?= $data->nama ?>" data-unit="<?= $data->unit_nama ?>" data-stok="<?= $data->stok ?>">
                                        <i class="fa fa-check"></i>Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var tanaman_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var nama = $(this).data('nama');
            var unit_nama = $(this).data('unit');
            var stok = $(this).data('stok');
            $('#tanaman_id').val(tanaman_id);
            $('#barcode').val(barcode);
            $('#nama_tanaman').val(nama);
            $('#unit_name').val(unit_nama);
            $('#stock').val(stok);
            $('#modal-item').modal('hide');
        })
    })
</script>