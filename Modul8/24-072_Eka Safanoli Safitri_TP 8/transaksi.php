<?php
session_start();
if (!isset($_SESSION['username'])) { 
    header("Location: login.php");
}
?>
<link rel="stylesheet" href="style.css">
<?php include "navbar.php"; ?>

<h2>Transaksi Penjualan</h2>

<form action="proses_transaksi.php" method="POST">
    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" required><br><br>

    <label>Jumlah:</label><br>
    <input type="number" name="jumlah" required><br><br>

    <label>Total Harga:</label><br>
    <input type="number" name="total" required><br><br>

    <button type="submit">Simpan Transaksi</button>
</form>

<h3>Riwayat Transaksi</h3>
<table border="1" cellpadding="10">
<tr><th>No</th><th>Nama Barang</th><th>Jumlah</th><th>Total</th></tr>
<tr><td>1</td><td>Pensil</td><td>2</td><td>4000</td></tr>
<tr><td>2</td><td>Buku</td><td>1</td><td>5000</td></tr>
</table>

<br>
<center><a href="logout.php" class="btn-logout">Logout</a></center>