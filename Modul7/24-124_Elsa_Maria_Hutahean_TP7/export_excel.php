<?php 
require "koneksi.php";

$query = "SELECT t.waktu_transaksi, SUM(td.harga) as total_harga 
FROM transaksi as t JOIN transaksi_detail as td 
ON t.id = td.transaksi_id GROUP BY td.transaksi_id";
$execute = mysqli_query($conn, $query);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal = [];
$total_harga = [];
$data = [];
foreach($result as $value){
    $tanggal[] = $value['waktu_transaksi'];
    $total_harga[] = $value['total_harga'];
    $data[] = $value;
}

header('Content-Type: application/vnd.ms-excel; charset:utf-8');
header('Content-Disposition: attachment; filename=reporting.xls');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="1" cellspacing="0">
        <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
        </tr>
        <?php $no = 0; ?>
        <?php foreach($data as $key => $value): ?>
            <?php $no++ ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $value['waktu_transaksi'] ?></td>
                <td><?= $value['total_harga'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>