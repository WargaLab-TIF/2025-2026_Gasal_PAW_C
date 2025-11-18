<?php 
require "koneksi.php";

$dari   = $_GET['dari'];
$sampai = $_GET['sampai'];


$query = "SELECT t.waktu_transaksi, SUM(td.harga) AS total_harga 
    FROM transaksi t 
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE t.waktu_transaksi BETWEEN '$dari' AND '$sampai'
    GROUP BY td.transaksi_id
    ORDER BY t.waktu_transaksi ASC
";
$execute = mysqli_query($conn, $query);
$rekap   = mysqli_fetch_all($execute, MYSQLI_ASSOC);


$query2 = "SELECT COUNT(DISTINCT t.id) AS total_pelanggan,
    SUM(td.harga) AS total_pendapatan
    FROM transaksi t
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE t.waktu_transaksi BETWEEN '$dari' AND '$sampai'
";
$execute2 = mysqli_query($conn, $query2);
$total = mysqli_fetch_assoc($execute2);


header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=rekap_laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<h2>Rekap Laporan Penjualan</h2>
<b><?= $dari ?> sampai <?= $sampai ?></b>
<br><br>


<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php 
    $no = 1; 
    foreach($rekap as $row): 
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td>Rp. <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
        <td><?= date('d-M-y', strtotime($row['waktu_transaksi'])) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br>

<table border="0" cellpadding="5">
    <tr>
        <td><b>Jumlah Pelanggan</b></td>
        <td><b>Jumlah Pendapatan</b></td>
    </tr>

    <tr>
        <td><?= $total['total_pelanggan'] ?> Orang</td>
        <td>Rp. <?= number_format($total['total_pendapatan'], 0, ',', '.') ?></td>
    </tr>
</table>
