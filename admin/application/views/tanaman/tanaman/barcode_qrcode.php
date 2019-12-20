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
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Barcode Generator</h3>
            <div class="pull-right">
                <a href="<?= site_url('tanaman') ?>" class="btn btn-warning btn-flat btn-sm">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="box-body ">
            <?php
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="width:200px">';
            ?>
            <br>
            <?= $row->barcode ?>
            <br><br>
            <a href="<?= site_url('tanaman/barcode_print/' . $row->tanaman_id) ?>" target="_blank" class="btn btn-success btn-sm">
                <i class="fa fa-print"> Print</i>
            </a>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">QR-Code Generator<i class="fa fa-qrcode"></i></h3>
        </div>

        <div class="box-body ">
            <?php
            $qrCode = new Endroid\QrCode\QrCode($row->barcode);

            $qrCode->writeFile('uploads/qr-code/tanaman-' . $row->barcode . '.png');
            ?>
            <img src="<?= base_url('uploads/qr-code/tanaman-' . $row->barcode . '.png') ?>" style="width:200px">
            <br>
            <?= $row->barcode ?>
            <br><br>
            <a href="<?= site_url('tanaman/qrcode_print/' . $row->tanaman_id) ?>" target="_blank" class="btn btn-success btn-sm">
                <i class="fa fa-print"> Print</i>
            </a>
        </div>
    </div>
</section>