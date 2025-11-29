<?php
require "koneksi.php";

$dari   = $_GET['dari'];
$sampai = $_GET['sampai'];

$query = "SELECT COUNT(DISTINCT t.id) AS total_transaksi,
    SUM(td.harga) AS total_pendapatan
    FROM transaksi t 
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE t.waktu_transaksi BETWEEN '$dari' AND '$sampai'
";
$execute = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($execute);

echo "<p>Total Transaksi: <b>{$data['total_transaksi']}</b></p>";
echo "<p>Total Pendapatan: <b>Rp {$data['total_pendapatan']}</b></p>";
?>


