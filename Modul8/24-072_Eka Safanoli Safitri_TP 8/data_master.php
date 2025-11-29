<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != 1) {
    header("Location: login.php");
}
?>
<link rel="stylesheet" href="style.css">
<?php include "navbar.php"; ?>

<h2>Data Master</h2>

<h3>Data Barang</h3>
<table border="1" cellpadding="10">
<tr><th>Kode</th><th>Nama</th><th>Stok</th><th>Harga</th></tr>
<tr><td>B001</td><td>Pensil</td><td>100</td><td>2000</td></tr>
<tr><td>B002</td><td>Buku</td><td>50</td><td>5000</td></tr>
</table>

<br>
<center><a href="logout.php" class="btn-logout">Logout</a></center>