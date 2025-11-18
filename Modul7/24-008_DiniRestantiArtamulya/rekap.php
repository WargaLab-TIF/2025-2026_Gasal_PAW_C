<?php
require "koneksi.php";

$dari   = $_GET['dari'];
$sampai = $_GET['sampai'];

$query = "SELECT t.waktu_transaksi, SUM(td.harga) AS total_harga 
    FROM transaksi t 
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE t.waktu_transaksi BETWEEN '$dari' AND '$sampai'
    GROUP BY td.transaksi_id
";
$execute = mysqli_query($conn, $query);
$result  = mysqli_fetch_all($execute, MYSQLI_ASSOC);
?>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total Harga</th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach($result as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['waktu_transaksi'] ?></td>
        <td><?= $row['total_harga'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
