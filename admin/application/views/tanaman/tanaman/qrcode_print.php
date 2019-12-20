<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR-code Product <?= $row->barcode ?></title>
</head>

<body>
    <img src="uploads/qr-code/tanaman-<?= $row->barcode ?>.png" style="width:200px">

</body>

</html>