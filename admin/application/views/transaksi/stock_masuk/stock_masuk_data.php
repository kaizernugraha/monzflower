<section class="content-header">
    <h1>
        Transaksi
        <small>Stock Tanaman Masuk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cart-plus"></i></a></li>
        <li>Transaksi</li>
        <li class="active">Stock Masuk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box box-info">
        <div class="box-header ">
            <h3 class="box-title"><i class="fa fa-cubes"></i> Data Stock Masuk</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/masuk/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-cubes"> Tambah Stok masuk</i>
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Barcode</th>
                        <th>Tanaman Item</th>
                        <th>Qty</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td><?= $data->barcode ?></td>
                            <td><?= $data->tanaman_nama ?></td>
                            <td class="text-right"><?= $data->qty ?></td>
                            <td class="text-center"><?= indo_date($data->date) ?></td>
                            <td align="center" width="160px">
                                <a id="set_dtl" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail" data-barcode="<?= $data->barcode ?>" data-tanaman_nama="<?= $data->tanaman_nama ?>" data-detail="<?= $data->detail ?>" data-supplier_nama="<?= $data->supplier_nama ?>" data-qty="<?= $data->qty ?>" data-date="<?= indo_date($data->date) ?>">
                                    <i class="fa fa-eye"> Detail</i>
                                </a>
                                <a href="<?= site_url('stock/masuk/del/' . $data->stock_id . '/' . $data->tanaman_id) ?>" onclick="return confirm('Yakin Menghapus Data ?..')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Hapus</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Barcode</th>
                        <th>Tanaman Item</th>
                        <th>Qty</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</section>



<div class="modal modal-info fade" id="modal-detail" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Stock Masuk Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:35%">Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Tanaman</th>
                            <td><span id="tanaman_nama"></span></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Supplier</th>
                            <td><span id="supplier_nama"></span></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var barcode = $(this).data('barcode');
            var tanaman_nama = $(this).data('tanaman_nama');
            var detail = $(this).data('detail');
            var supplier_nama = $(this).data('supplier_nama');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            $('#barcode').text(barcode);
            $('#tanaman_nama').text(tanaman_nama);
            $('#detail').text(detail);
            $('#supplier_nama').text(supplier_nama);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#detail').text(detail);
        })
    })
</script>