<!DOCTYPE html>
<html>
<head>
    <title>Program Kasir Sederhana</title>
</head>
<body>
<h2>Program Kasir Sederhana</h2>

<form method="post">
    <label>Pilih Menu:</label><br>
    <select name="menu">
        <option value="15000">Ayam Goreng - Rp 15.000</option>
        <option value="17000">Lele goreng - Rp 17.000</option>
        <option value="3000">Es Teh - Rp 3.000</option>
    </select>
    <br><br>

    <label>Jumlah Beli:</label><br>
    <input type="number" name="jumlah" min="1" value="1" required>
    <br><br>

    <input type="submit" name="tambah" value="Tambah ke Keranjang">
    <input type="submit" name="selesai" value="Selesai">
</form>

<?php
session_start();

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

if (isset($_POST['tambah'])) {
    $harga = $_POST['menu'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;
    $_SESSION['keranjang'][] = $total;
    echo "<p>Item berhasil ditambahkan!</p>";
}

if (isset($_POST['selesai'])) {
    $total = array_sum($_SESSION['keranjang']);
    echo "<h3>Total yang harus dibayar: Rp " . $total . "</h3>";
    session_destroy(); // untuk mereset setelah selesai
}
?>
</body>
</html>