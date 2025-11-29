<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<link rel="stylesheet" href="style.css">
<?php include "navbar.php"; ?>

<h2>Laporan Penjualan</h2>

<table border="1" cellpadding="10">
<tr><th>Bulan</th><th>Total Transaksi</th><th>Pendapatan</th></tr>
<tr><td>Januari</td><td>120</td><td>30.000.000</td></tr>
<tr><td>Februari</td><td>98</td><td>25.500.000</td></tr>
</table>

<br>
<center><a href="logout.php" class="btn-logout">Logout</a></center>